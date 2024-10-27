import React, { useState, useRef, useEffect } from "react";
import PropertyCard from "../../components/front/properties/PropertyCard";
import PropertiesData from "../../api/property/getAllProperties";
import TypesProperty from "../../api/property/getTypeProperties";
import CategoriesData from "../../api/category/getAllCategories";
import ReactPaginate from "react-paginate";

const Properties = () => {
    const [currentPage, setCurrentPage] = useState(1);
    const [pageCount, setPageCount] = useState(1);
    const itemsPerPage = 9;
    const [filter, setFilter] = useState([]);
    const [statusProperty, setStatusProperty] = useState("all");

    const {
        loading: propertiesLoading,
        error: propertiesError,
        data: properties,
    } = PropertiesData(currentPage, filter);
    const {
        loading: categoriesLoading,
        error: categoriesError,
        data: categories,
    } = CategoriesData();
    const {
        loading: typesLoading,
        error: typesError,
        data: types,
    } = TypesProperty();

    useEffect(() => {
        if (properties && properties.total) {
            setPageCount(Math.ceil(properties.total / itemsPerPage));
        }
    }, [properties, filter]);

    // Start Filter Category
    const dropdownWrapperCategoryRef = useRef(null);
    const toggleDropdownCategoryRef = useRef(null);
    const buttonTextRef = useRef(null);
    const dropdownArrowRef = useRef(null);
    const dropdownMenuCategoryRef = useRef(null);
    const [selectedOption, setSelectedOption] = useState("تحديد الفئة");

    // Function to set the default or selected option text
    const setDefaultOption = () => {
        if (buttonTextRef.current) {
            const storedData = JSON.parse(localStorage.getItem("search")) || {};
            const category = storedData.category || selectedOption;
            buttonTextRef.current.textContent = category;
            highlightActiveOption(category); // Highlight the active option
        }
    };

    // Function to highlight the active option
    const highlightActiveOption = (defaultOption) => {
        const options =
            dropdownMenuCategoryRef.current.querySelectorAll("button");
        options.forEach((option) => {
            if (option.getAttribute("data-option") === defaultOption) {
                option.setAttribute("active", "true");
                option.classList.add("active-option");
            } else {
                option.removeAttribute("active");
                option.classList.remove("active-option");
            }
        });
    };

    useEffect(() => {
        // Set default option on component mount
        setDefaultOption();

        // Detect clicks outside the dropdown
        const handleClickOutside = (event) => {
            if (
                dropdownWrapperCategoryRef.current &&
                !dropdownWrapperCategoryRef.current.contains(event.target)
            ) {
                toggleDropdownCategoryRef.current.checked = false;
                dropdownArrowRef.current.classList.remove("rotate-180");
            }
        };

        document.addEventListener("click", handleClickOutside);
        return () => {
            document.removeEventListener("click", handleClickOutside);
        };
    }, [selectedOption]);

    const handleDropdownSelect = (event) => {
        if (event.target.tagName === "BUTTON") {
            const selectedOption = event.target.getAttribute("data-option");
            setFilter((prevFilter) => ({
                ...prevFilter,
                category_name: selectedOption,
            }));

            setSelectedOption(selectedOption);
            localStorage.setItem(
                "search",
                JSON.stringify({ category: selectedOption })
            );
            setDefaultOption();
            dropdownArrowRef.current.classList.remove("rotate-180");
        }
    };

    const toggleDropdown = () => {
        dropdownArrowRef.current.classList.toggle("rotate-180");
    };

    const resetSearchCategory = () => {
        setFilter((prevFilter) => {
            const { category_name, ...rest } = prevFilter;
            return rest;
        });
        localStorage.removeItem("search");
        setSelectedOption("تحديد الفئة");
        setDefaultOption();
    };

    const hideDropdown = () => {
        toggleDropdownCategoryRef.current.checked = false;
        dropdownArrowRef.current.classList.remove("rotate-180");
    };
    // End Filter Category

    // Start Filter Status
    const handleRadioChange = (event) => {
        const selectedOption = event.target.value;
        setStatusProperty(selectedOption);
        setFilter((prevFilter) => ({
            ...prevFilter,
            status: selectedOption, // Add new status to the array
        }));

        // Save the checked option to localStorage
        const searchData = JSON.parse(localStorage.getItem("search")) || {};
        searchData.status_property = selectedOption;
        localStorage.setItem("search", JSON.stringify(searchData));
    };

    // Load the saved radio state from localStorage on component mount
    useEffect(() => {
        const searchData = JSON.parse(localStorage.getItem("search"));
        if (searchData && searchData.status_property) {
            setStatusProperty(searchData.status_property);
        }
    }, []);
    // End Filter Status

    // Start Filter Type
    const dropdownWrapperTypeRef = useRef(null);
    const toggleDropdownTypeRef = useRef(null);
    const buttonTextTypeRef = useRef(null);
    const dropdownArrowTypeRef = useRef(null);
    const dropdownMenuTypeRef = useRef(null);
    const [selectedType, setSelectedType] = useState("تحديد النوع"); // Default text

    // Function to set the default or selected type text
    const setDefaultType = () => {
        if (buttonTextTypeRef.current) {
            const storedData = JSON.parse(localStorage.getItem("search")) || {};
            const type = storedData.type || selectedType;
            buttonTextTypeRef.current.textContent = type;
            highlightActiveType(type); // Highlight the active option
        }
    };

    // Function to highlight the active option
    const highlightActiveType = (defaultOption) => {
        const options = dropdownMenuTypeRef.current.querySelectorAll("button");
        options.forEach((option) => {
            if (option.getAttribute("data-option") === defaultOption) {
                option.setAttribute("active", "true");
                option.classList.add("active-option");
            } else {
                option.removeAttribute("active");
                option.classList.remove("active-option");
            }
        });
    };

    useEffect(() => {
        // Set default type on component mount
        setDefaultType();

        // Detect clicks outside the dropdown
        const handleClickOutside = (event) => {
            if (
                dropdownWrapperTypeRef.current &&
                !dropdownWrapperTypeRef.current.contains(event.target)
            ) {
                toggleDropdownTypeRef.current.checked = false;
                dropdownArrowTypeRef.current.classList.remove("rotate-180");
            }
        };

        document.addEventListener("click", handleClickOutside);
        return () => {
            document.removeEventListener("click", handleClickOutside);
        };
    }, [selectedType]);

    const handleDropdownSelectType = (event) => {
        if (event.target.tagName === "BUTTON") {
            const selectedType = event.target.getAttribute("data-option");
            setFilter((prevFilter) => ({
                ...prevFilter,
                type_name: selectedType,
            }));

            setSelectedType(selectedType);
            localStorage.setItem(
                "search",
                JSON.stringify({ type: selectedType })
            );
            setDefaultType();
            dropdownArrowTypeRef.current.classList.remove("rotate-180");
        }
    };

    const toggleDropdownType = () => {
        dropdownArrowTypeRef.current.classList.toggle("rotate-180");
    };

    const resetSearchType = () => {
        setFilter((prevFilter) => {
            const { type_name, ...rest } = prevFilter;
            return rest;
        });
        localStorage.removeItem("search");
        setSelectedType("تحديد النوع");
        setDefaultType();
    };

    const hideDropdownType = () => {
        toggleDropdownTypeRef.current.checked = false;
        dropdownArrowTypeRef.current.classList.remove("rotate-180");
    };
    // End Filter Type

    // Refs for various elements
    const dropdownWrapperRef = useRef(null);
    const toggleDropdownRef = useRef(null);
    const dropdownButtonRef = useRef(null);
    const dropdownMenuRef = useRef(null);
    const buttonTextRoomRef = useRef(null);
    const dropdownArrowRoomRef = useRef(null);
    const resetSearchRef = useRef(null);
    const hideButtonRef = useRef(null);

    // State management for selected options
    const [selectedBedrooms, setSelectedBedrooms] = useState("عدد الغرف");
    const [selectedBathrooms, setSelectedBathrooms] = useState("عدد الحمامات");

    // Initialize default option
    const setDefaultOptionRoom = () => {
        if (buttonTextRoomRef.current) {
            buttonTextRoomRef.current.textContent = `${selectedBedrooms} / ${selectedBathrooms}`;
        }
        highlightActiveOptions("bedroomOptions", selectedBedrooms);
        highlightActiveOptions("bathroomOptions", selectedBathrooms);
    };

    // Helper function to highlight active options
    const highlightActiveOptions = (optionsId, activeOption) => {
        const options = dropdownMenuRef.current?.querySelectorAll(
            `#${optionsId} button`
        );
        options?.forEach((option) => {
            const isActive =
                option.getAttribute("data-option") === activeOption;
            option.setAttribute("active", isActive ? "true" : "false");
            option.classList.toggle("active-option", isActive);
        });
    };

    useEffect(() => {
        setDefaultOptionRoom(); // Set default option on component mount

        const handleClickOutside = (event) => {
            if (!dropdownWrapperRef.current?.contains(event.target)) {
                toggleDropdownRef.current.checked = false;
                dropdownArrowRoomRef.current?.classList.remove("rotate-180");
            }
        };

        const handleDropdownClick = (event) => {
            if (event.target.tagName === "BUTTON") {
                const selectedOption = event.target.getAttribute("data-option");
                const optionType =
                    event.target.closest("div").id === "bedroomOptions"
                        ? "bedrooms"
                        : "bathrooms";

                const searchData =
                    JSON.parse(localStorage.getItem("search")) || {};
                searchData[optionType] = selectedOption;
                localStorage.setItem("search", JSON.stringify(searchData));

                // Update the displayed text
                if (buttonTextRoomRef.current) {
                    buttonTextRoomRef.current.textContent = `${searchData.bedrooms || "عدد الغرف"
                        } / ${searchData.bathrooms || "عدد الحمامات"}`;
                }

                // Highlight active options
                highlightActiveOptions(
                    "bedroomOptions",
                    searchData.bedrooms || "عدد الغرف"
                );
                highlightActiveOptions(
                    "bathroomOptions",
                    searchData.bathrooms || "عدد الحمامات"
                );
                dropdownArrowRoomRef.current?.classList.remove("rotate-180");

                // Update filter state
                setFilter((prevFilter) => ({
                    ...prevFilter,
                    bedrooms: searchData.bedrooms,
                    bathrooms: searchData.bathrooms,
                }));

                // Update state for selected options
                if (optionType === "bedrooms") {
                    setSelectedBedrooms(selectedOption);
                } else {
                    setSelectedBathrooms(selectedOption);
                }
            }
        };

        // Add event listeners
        document.addEventListener("click", handleClickOutside);
        dropdownMenuRef.current?.addEventListener("click", handleDropdownClick);

        // Cleanup event listeners
        return () => {
            document.removeEventListener("click", handleClickOutside);
            dropdownMenuRef.current?.removeEventListener(
                "click",
                handleDropdownClick
            );
        };
    }, []);

    const handleDropdownButtonClick = () => {
        dropdownArrowRoomRef.current?.classList.toggle("rotate-180");
    };

    const handleResetSearchRoom = () => {
        const searchData = JSON.parse(localStorage.getItem("search")) || {};
        delete searchData.bedrooms;
        delete searchData.bathrooms;
        localStorage.setItem("search", JSON.stringify(searchData));
        setDefaultOptionRoom();
        setFilter((prevFilter) => {
            const { bedrooms, bathrooms, ...rest } = prevFilter;
            return rest;
        });
    };

    const handleHideButton = () => {
        toggleDropdownRef.current.checked = false;
        dropdownArrowRoomRef.current?.classList.remove("rotate-180");
    };

    const handlePageClick = async (data) => {
        let currentPage = data.selected + 1;
        setCurrentPage(currentPage);
    };

    if (propertiesLoading || categoriesLoading) {
        return (
            <div
                id="preloader"
                className="relative w-full h-full z-[5000] flex items-center justify-center bg-white transition duration-200 opacity-[1] block"
            >
                <div className="loader"></div>
            </div>
        );
    }

    if (categoriesError) {
        return <div>Error: {categoriesError}</div>;
    }

    return (
        <div>
            {/*  Start Breadcrumb */}
            <div className="flex text-gray-700 my-4" aria-label="Breadcrumb">
                <div className="container mx-auto">
                    <ol className="px-5 py-3 inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse border border-gray-200 rounded-lg bg-gray-50">
                        <li className="inline-flex items-center">
                            <a
                                href="#"
                                className="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600"
                            >
                                <svg
                                    className="w-3 h-3 me-2.5"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                </svg>
                            </a>
                        </li>
                        <li aria-current="page">
                            <div className="flex items-center">
                                <svg
                                    className="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 6 10"
                                >
                                    <path
                                        stroke="currentColor"
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth="2"
                                        d="m1 9 4-4-4-4"
                                    />
                                </svg>
                                <span className="ms-1 text-sm font-medium text-gray-500 md:ms-2">
                                    العقارات
                                </span>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
            {/* End Breadcrumb */}

            {/* Start Filter Search  */}
            <div className="filter pb-5 mb-5 border-b border-gray-300">
                <div className="container mx-auto relative">
                    <div className="flex flex-wrap items-center">
                        {/* category properties */}
                        <div
                            className="relative inline-block text-left ml-2.5"
                            ref={dropdownWrapperCategoryRef}
                        >
                            <input
                                type="checkbox"
                                id="toggleDropdownCategory"
                                className="peer hidden"
                                ref={toggleDropdownCategoryRef}
                                onChange={toggleDropdown}
                            />

                            <label
                                id="dropdownButtonCategory"
                                htmlFor="toggleDropdownCategory"
                                className="ring-1 ring-blue-300 focus:outline-none font-medium rounded-lg text-sm px-5 py-3 text-center inline-flex items-center cursor-pointer"
                            >
                                <span ref={buttonTextRef}>
                                    {selectedOption}
                                </span>
                                <svg
                                    ref={dropdownArrowRef}
                                    className="w-2.5 h-2.5 ms-3 transition-transform duration-200"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 10 6"
                                >
                                    <path
                                        stroke="currentColor"
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth="2"
                                        d="m1 1 4 4 4-4"
                                    />
                                </svg>
                            </label>

                            {/* Dropdown Menu */}
                            <div
                                className="z-[250] before:absolute before:bottom-full before:left-[12.6rem] before:w-0 before:h-0 before:border-t-0 before:border-b-[.75rem] before:border-b-white before:border-transparent before:border-l-[.75rem] before:border-r-[.75rem] before:border-transparent before:content-[''] before:[filter:drop-shadow(0_-0.0625rem_0.0625rem_rgba(0,_0,_0,_0.1))] hidden peer-checked:block absolute mt-[16px] w-[250px] rounded-md shadow-xl bg-white border border-gray-200"
                                ref={dropdownMenuCategoryRef}
                                onClick={handleDropdownSelect}
                            >
                                <div className="p-3">
                                    <p className="text-[#4c4a4a] text-[15px] font-[600] w-fit mb-3">
                                        نوع العرض
                                    </p>
                                    <ul className="flex flex-wrap justify-between w-full border-[.1rem] rounded p-2 mb-3 z-[500]">
                                        {categories.length > 0 ? (
                                            categories.map(
                                                (category, index) => (
                                                    <li
                                                        className="w-[49%]"
                                                        key={index}
                                                    >
                                                        <button
                                                            role="checkbox"
                                                            name="category"
                                                            className="w-full block px-4 py-2 mb-1 text-sm text-gray-700 hover:bg-gray-100 rounded transition duration-200"
                                                            data-option={
                                                                category.name
                                                            }
                                                        >
                                                            {category.name}
                                                        </button>
                                                    </li>
                                                )
                                            )
                                        ) : (
                                            <p className="text-center">
                                                لا يوجد فئة
                                            </p>
                                        )}
                                    </ul>
                                    <div className="flex w-full text-[14px] font-bold">
                                        <input
                                            type="button"
                                            id="resetSearchCategory"
                                            className="hidden"
                                        />
                                        <label
                                            htmlFor="resetSearchCategory"
                                            className="w-1/2 ml-1 rounded border border-sky-500 py-2 text-center cursor-pointer"
                                            onClick={resetSearchCategory}
                                        >
                                            إعادة ضبط
                                        </label>
                                        <input
                                            type="button"
                                            id="okCategory"
                                            className="hidden"
                                        />
                                        <label
                                            htmlFor="okCategory"
                                            className="w-1/2 mr-1 rounded bg-sky-500 py-2 text-center cursor-pointer text-white"
                                            onClick={hideDropdown}
                                        >
                                            تم
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {/* property search */}
                        <div
                            className="flex-grow w-[55%] md:w-1/2 lg:w-0 relative"
                            onClick="event.stopImmediatePropagation();"
                        >
                            <div>
                                <input
                                    id="autocompleteInput"
                                    placeholder="ادخل الموقع"
                                    className="relative pr-8 py-3 text-sm w-full border border-gray-300 rounded-md focus:outline-none focus:border-sky-500 transition duration-200"
                                    onKeyUp="onkeyUp(event)"
                                />
                                <i className="absolute right-0 top-[15px] mr-2 fa-solid fa-location-dot"></i>
                            </div>
                            <div
                                id="dropdown"
                                className="w-full h-60 border border-gray-300 rounded-md bg-white absolute overflow-y-auto hidden z-[251]"
                            ></div>
                        </div>

                        {/*  status property */}
                        <div className="flex items-center mt-2 md:mt-0 md:mr-2.5 ml-2.5 md:ml-0 border border-gray-300 rounded-md px-1 py-1 text-sm">
                            {/* status-property-all */}
                            <input
                                type="radio"
                                className="hidden peer"
                                id="status-property-all"
                                name="status-property"
                                value="all"
                                checked={statusProperty === "all"}
                                onChange={handleRadioChange}
                            />
                            <label
                                htmlFor="status-property-all"
                                className={`py-2 px-3 rounded-md cursor-pointer transition duration-200 hover:bg-sky-100 ml-1 ${statusProperty === "all"
                                    ? "active-option"
                                    : ""
                                    }`}
                            >
                                الجميع
                            </label>

                            {/* status-property-ready */}
                            <input
                                type="radio"
                                className="hidden"
                                id="status-property-ready"
                                name="status-property"
                                value="ready"
                                checked={statusProperty === "ready"}
                                onChange={handleRadioChange}
                            />
                            <label
                                htmlFor="status-property-ready"
                                className={`py-2 px-3 rounded-md cursor-pointer transition duration-200 hover:bg-sky-100 ml-1 ${statusProperty === "ready"
                                    ? "active-option"
                                    : ""
                                    }`}
                            >
                                جاهز
                            </label>

                            {/* status-property-under-construction */}
                            <input
                                type="radio"
                                className="hidden"
                                id="status-property-under-construction"
                                name="status-property"
                                value="under-construction"
                                checked={
                                    statusProperty === "under-construction"
                                }
                                onChange={handleRadioChange}
                            />
                            <label
                                htmlFor="status-property-under-construction"
                                className={`py-2 px-3 rounded-md cursor-pointer transition duration-200 hover:bg-sky-100 ${statusProperty === "under-construction"
                                    ? "active-option"
                                    : ""
                                    }`}
                            >
                                قيد الانشاء
                            </label>
                        </div>

                        {/* type properties */}
                        <div
                            className="relative w-1/2 sm:w-auto mt-2 lg:mt-0 inline-block text-left lg:mr-2.5 md:mr-0 ml-2.5 md:ml-0"
                            ref={dropdownWrapperTypeRef}
                        >
                            <input
                                type="checkbox"
                                id="toggleDropdownType"
                                className="peer hidden"
                                ref={toggleDropdownTypeRef}
                                onChange={toggleDropdownType}
                            />

                            <label
                                id="dropdownButtonType"
                                htmlFor="toggleDropdownType"
                                className="border border-gray-300 w-full focus:outline-none font-medium rounded-lg text-sm px-5 py-3 text-center inline-flex justify-between items-center cursor-pointer"
                            >
                                <span ref={buttonTextTypeRef}>
                                    {selectedType}
                                </span>
                                <svg
                                    ref={dropdownArrowTypeRef}
                                    className="w-2.5 h-2.5 ms-3 transition-transform duration-200"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 10 6"
                                >
                                    <path
                                        stroke="currentColor"
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth="2"
                                        d="m1 1 4 4 4-4"
                                    />
                                </svg>
                            </label>

                            {/* Dropdown Menu */}
                            <div
                                className="z-[250] before:absolute before:bottom-full before:left-[12.6rem] before:w-0 before:h-0 before:border-t-0 before:border-b-[.75rem] before:border-b-white before:border-transparent before:border-l-[.75rem] before:border-r-[.75rem] before:border-transparent before:content-[''] before:[filter:drop-shadow(0_-0.0625rem_0.0625rem_rgba(0,_0,_0,_0.1))] hidden peer-checked:block absolute mt-[16px] w-[250px] rounded-md shadow-xl bg-white border border-gray-200"
                                ref={dropdownMenuTypeRef}
                                onClick={handleDropdownSelectType}
                            >
                                <div className="p-3">
                                    <p className="text-[#4c4a4a] text-[15px] font-[600] w-fit mb-3">
                                        نوع العرض
                                    </p>
                                    <ul className="flex flex-wrap w-full border-[.1rem] rounded p-2 mb-3">
                                        {types.length > 0 ? (
                                            types.map((type, index) => (
                                                <li
                                                    className="w-[49%]"
                                                    key={index}
                                                >
                                                    <button
                                                        role="checkbox"
                                                        name="type_name"
                                                        className="w-full block px-4 py-2 mb-1 text-sm text-gray-700 hover:bg-gray-100 rounded transition duration-200"
                                                        data-option={type.name}
                                                    >
                                                        {type.name}
                                                    </button>
                                                </li>
                                            ))
                                        ) : (
                                            <p className="text-center">
                                                لا يوجد فئة
                                            </p>
                                        )}
                                    </ul>
                                    <div className="flex w-full text-[14px] font-bold">
                                        <input
                                            type="button"
                                            id="resetSearchType"
                                            className="hidden"
                                        />
                                        <label
                                            htmlFor="resetSearchType"
                                            className="w-1/2 ml-1 rounded border border-sky-500 py-2 text-center cursor-pointer"
                                            onClick={resetSearchType}
                                        >
                                            إعادة ضبط
                                        </label>
                                        <input
                                            type="button"
                                            id="okType"
                                            className="hidden"
                                        />
                                        <label
                                            htmlFor="okType"
                                            className="w-1/2 mr-1 rounded bg-sky-500 py-2 text-center cursor-pointer text-white"
                                            onClick={hideDropdownType}
                                        >
                                            تم
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {/* Number of [ Bedroom , Bathroom ] */}
                        <div
                            className="relative min-w-[50%] sm:min-w-fit mt-2 lg:mt-0 inline-block text-left md:mr-2.5 ml-2.5 md:ml-0"
                            ref={dropdownWrapperRef}
                        >
                            <input
                                type="checkbox"
                                id="toggleDropdownRooms"
                                className="peer hidden"
                                ref={toggleDropdownRef}
                            />

                            <label
                                id="dropdownButtonRooms"
                                htmlFor="toggleDropdownRooms"
                                className="ring-1 ring-blue-300 w-full focus:outline-none font-medium rounded-lg text-sm px-5 py-3 text-center inline-flex justify-between items-center cursor-pointer"
                                ref={dropdownButtonRef}
                                onClick={handleDropdownButtonClick}
                            >
                                <span ref={buttonTextRoomRef}>
                                    {selectedBedrooms} / {selectedBathrooms}
                                </span>
                                <svg
                                    ref={dropdownArrowRoomRef}
                                    className="w-2.5 h-2.5 ms-3 transition-transform duration-200"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 10 6"
                                >
                                    <path
                                        stroke="currentColor"
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth="2"
                                        d="m1 1 4 4 4-4"
                                    />
                                </svg>
                            </label>

                            <div
                                className="dropdown-room z-[250] before:absolute lg:before:left-[1.6rem] before:left-[12.6rem] before:bottom-full before:w-0 before:h-0 before:border-t-0 before:border-b-[.75rem] before:border-b-white before:border-transparent before:border-l-[.75rem] before:border-r-[.75rem] before:border-transparent before:content-[''] before:[filter:drop-shadow(0_-0.0625rem_0.0625rem_rgba(0,_0,_0,_0.1))] hidden peer-checked:block absolute lg:left-0 right-0 lg:right-auto mt-[16px] w-[250px] rounded-md shadow-xl bg-white border border-gray-200"
                                ref={dropdownMenuRef}
                            >
                                <div className="p-3">
                                    <div className="flex flex-wrap w-full border-[.1rem] rounded p-2 mb-3">
                                        <div className="w-1/2 p-2 border-l">
                                            <p className="text-[#4c4a4a] text-center text-[14px] font-[600] mb-2">
                                                عدد الغرف
                                            </p>
                                            <ul
                                                id="bedroomOptions"
                                                className="flex flex-wrap"
                                            >
                                                {[1, 2, 3, 4].map((num) => (
                                                    <li
                                                        key={`bedroom-${num}`}
                                                        className="w-1/2"
                                                    >
                                                        <button
                                                            className="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded transition duration-200"
                                                            data-option={num}
                                                            onClick={() => {
                                                                setSelectedBedrooms(
                                                                    num
                                                                );
                                                                setFilter(
                                                                    (
                                                                        prevFilter
                                                                    ) => ({
                                                                        ...prevFilter,
                                                                        bedroom:
                                                                            num,
                                                                    })
                                                                );
                                                                buttonTextRoomRef.current.textContent = `${num} / ${selectedBathrooms}`;
                                                                const options =
                                                                    dropdownMenuRef.current.querySelectorAll(
                                                                        "#bedroomOptions button"
                                                                    );
                                                                options.forEach(
                                                                    (
                                                                        option
                                                                    ) => {
                                                                        if (
                                                                            option.getAttribute(
                                                                                "data-option"
                                                                            ) ===
                                                                            num.toString()
                                                                        ) {
                                                                            option.classList.toggle(
                                                                                "active-option"
                                                                            );
                                                                        } else {
                                                                            option.classList.remove(
                                                                                "active-option"
                                                                            );
                                                                        }
                                                                    }
                                                                );
                                                            }}
                                                        >
                                                            {num}
                                                        </button>
                                                    </li>
                                                ))}
                                            </ul>
                                        </div>
                                        <div className="w-1/2 p-2">
                                            <p className="text-[#4c4a4a] text-center text-[14px] font-[600] mb-2">
                                                عدد الحمامات
                                            </p>
                                            <ul
                                                id="bathroomOptions"
                                                className="flex flex-wrap"
                                            >
                                                {[1, 2, 3, 4].map((num) => (
                                                    <li
                                                        key={`bathroom-${num}`}
                                                        className="w-1/2"
                                                    >
                                                        <button
                                                            className="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded transition duration-200"
                                                            data-option={num}
                                                            onClick={() => {
                                                                setSelectedBathrooms(
                                                                    num
                                                                );
                                                                setFilter(
                                                                    (
                                                                        prevFilter
                                                                    ) => ({
                                                                        ...prevFilter,
                                                                        bathroom:
                                                                            num,
                                                                    })
                                                                );
                                                                buttonTextRoomRef.current.textContent = `${selectedBedrooms} / ${num}`;
                                                                const options =
                                                                    dropdownMenuRef.current.querySelectorAll(
                                                                        "#bathroomOptions button"
                                                                    );
                                                                options.forEach(
                                                                    (
                                                                        option
                                                                    ) => {
                                                                        if (
                                                                            option.getAttribute(
                                                                                "data-option"
                                                                            ) ===
                                                                            num.toString()
                                                                        ) {
                                                                            option.classList.toggle(
                                                                                "active-option"
                                                                            );
                                                                        } else {
                                                                            option.classList.remove(
                                                                                "active-option"
                                                                            );
                                                                        }
                                                                    }
                                                                );
                                                            }}
                                                        >
                                                            {num}
                                                        </button>
                                                    </li>
                                                ))}
                                            </ul>
                                        </div>
                                    </div>
                                    <div className="flex w-full text-[14px] font-bold">
                                        <input
                                            type="button"
                                            id="resetSearchRooms"
                                            className="hidden"
                                            ref={resetSearchRef}
                                        />
                                        <label
                                            htmlFor="resetSearchRooms"
                                            className="w-1/2 ml-1 rounded border border-sky-500 py-2 text-center cursor-pointer"
                                            onClick={() => {
                                                setFilter((prevFilter) => {
                                                    const {
                                                        bedroom,
                                                        bathroom,
                                                        ...rest
                                                    } = prevFilter;
                                                    return rest;
                                                });
                                                setSelectedBedrooms(
                                                    "عدد الغرف"
                                                );
                                                setSelectedBathrooms(
                                                    "عدد الحمامات"
                                                );
                                                buttonTextRoomRef.current.textContent =
                                                    "عدد الغرف / عدد الحمامات";
                                                const bedroomOptions =
                                                    dropdownMenuRef.current.querySelectorAll(
                                                        "#bedroomOptions button"
                                                    );
                                                bedroomOptions.forEach(
                                                    (option) => {
                                                        option.classList.remove(
                                                            "active-option"
                                                        );
                                                    }
                                                );
                                                const bathroomOptions =
                                                    dropdownMenuRef.current.querySelectorAll(
                                                        "#bathroomOptions button"
                                                    );
                                                bathroomOptions.forEach(
                                                    (option) => {
                                                        option.classList.remove(
                                                            "active-option"
                                                        );
                                                    }
                                                );
                                            }}
                                        >
                                            إعادة ضبط
                                        </label>
                                        <input
                                            type="button"
                                            id="okRooms"
                                            className="hidden"
                                            ref={hideButtonRef}
                                        />
                                        <label
                                            htmlFor="okRooms"
                                            className="w-1/2 mr-1 rounded bg-sky-500 py-2 text-center cursor-pointer text-white"
                                            onClick={handleHideButton}
                                        >
                                            تم
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {/* Reset All Search  */}
                        <button
                            id="resetAllSearch"
                            className="mt-2 lg:mt-0 md:mr-2 rounded-md border border-sky-500 bg-sky-500 py-2 font-bold text-center cursor-pointer text-white text-sm py-3 px-5 transition duration-200 hover:text-black hover:bg-white hover:border hover:border-sky-500"
                            onClick={() => {
                                setFilter([]);
                                setSelectedOption("تحديد الفئة");
                                resetSearchCategory();
                                setSelectedType("تحديد النوع");
                                setStatusProperty("all");
                                setSelectedBedrooms("عدد الغرف");
                                setSelectedBathrooms("عدد الحمامات");
                                resetSearchType();
                                buttonTextRoomRef.current.textContent =
                                    "عدد الغرف / عدد الحمامات";
                                const bedroomOptions =
                                    dropdownMenuRef.current.querySelectorAll(
                                        "#bedroomOptions button"
                                    );
                                bedroomOptions.forEach((option) => {
                                    option.classList.remove("active-option");
                                });
                                const bathroomOptions =
                                    dropdownMenuRef.current.querySelectorAll(
                                        "#bathroomOptions button"
                                    );
                                bathroomOptions.forEach((option) => {
                                    option.classList.remove("active-option");
                                });
                            }}
                        >
                            إعادة ضبط
                        </button>
                    </div>
                </div>
            </div>
            {/* // End Filter Search */}

            {/*  Start Show Properties  */}
            <div className="properties">
                <div className="container mx-auto relative">
                    {propertiesError ? (
                        <div className="flex items-center justify-center">
                            <div className="text-center">
                                <h2 className="text-2xl font-bold text-sky-500 mb-4 animate-pulse">
                                    لا يوجد عقارات
                                </h2>
                                <p className="text-gray-600">
                                    التحقق من خيارات البحث أو حاول تحديث الصفحة.
                                </p>
                            </div>
                        </div>
                    ) : (
                        <div className="flex flex-wrap gap-2 md:gap-3 lg:gap-4 mb-5">
                            {properties.data.map((property, index) => (
                                <PropertyCard
                                    key={index}
                                    propertyRoute={`public/property-details/${property.slug}`}
                                    // loveRoute={property.loveRoute}
                                    imgs={property.property_images}
                                    tag={property.tag}
                                    price={property.price}
                                    propertyType={property.propertyType}
                                    bedroom={property.bedroom}
                                    bathroom={property.bathroom}
                                    area={property.area}
                                    address={property.address}
                                    advanceAmount={property.advanceAmount}
                                />
                            ))}
                        </div>
                    )}

                    {/* Start Pagination */}
                    {!propertiesError ? (
                        <ReactPaginate
                            previousLabel={"السابق"}
                            nextLabel={"التالي"}
                            breakLabel={"..."}
                            pageCount={pageCount}
                            marginPagesDisplayed={3}
                            pageRangeDisplayed={3}
                            onPageChange={handlePageClick}
                            breakClassName="hidden sm:flex tracking-[7px] mx-[10px] ml-[14px] h-full font-black flex items-center justify-center pl-3 pr-2 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700"
                            containerClassName="inline-flex -space-x-px text-sm"
                            pageClassName="hidden sm:flex"
                            pageLinkClassName="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700"
                            previousClassName="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700"
                            nextClassName="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700"
                            activeLinkClassName="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700"
                        ></ReactPaginate>
                    ) : (
                        ""
                    )}
                    {/* End Pagination */}
                </div>
            </div>
        </div>
    );
};

export default Properties;

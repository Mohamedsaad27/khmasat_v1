import React from "react";
import "flowbite-react";
import { TECarousel, TECarouselItem } from "tw-elements-react";

const PropertyCard = ({
    propertyRoute,
    // loveRoute,
    imgs,
    tag,
    price,
    propertyType,
    bedroom,
    bathroom,
    area,
    address,
    advanceAmount,
}) => {
    return (
        <div className="item overflow-hidden relative h-[400px] w-full lg:w-[32%] md:w-[49%] mb-4 border border-gray-300 rounded-lg">
            {/* Link item */}
            <a
                href={propertyRoute}
                className="link absolute w-full h-full z-[25]"
            ></a>

            {/* Love button */}
            {/* <a href={loveRoute} className="love z-[200] absolute left-0 flex items-center justify-center bg-white ml-5 mt-3 p-3 w-[30px] h-[30px] rounded-full transform transition-transform duration-200 hover:scale-110 group">
                <i className="fa-regular fa-heart text-[15px] transition duration-200 group-hover:text-red-500"></i>
            </a> */}

            {/* Images, love */}
            <div className="group carousel h-[60%]">
                {imgs && imgs.length > 0 ? (
                    <TECarousel
                        showControls
                        interval={0}
                        current={4}
                        // showIndicators
                        crossfade
                        ride="carousel"
                        prevBtnIcon={
                            <>
                                <span className="inline-block text-black h-8 w-8 [&>svg]:h-8">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        strokeWidth="1.5"
                                        stroke="currentColor"
                                    >
                                        <path
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            d="M15.75 19.5L8.25 12l7.5-7.5"
                                        />
                                    </svg>
                                </span>
                                <span className="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">
                                    Previous
                                </span>
                            </>
                        }
                        nextBtnIcon={
                            <>
                                <span className="inline-block text-black h-8 w-8 [&>svg]:h-8">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        strokeWidth="1.5"
                                        stroke="currentColor"
                                    >
                                        <path
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            d="M8.25 4.5l7.5 7.5-7.5 7.5"
                                        />
                                    </svg>
                                </span>
                                <span className="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">
                                    Next
                                </span>
                            </>
                        }
                        theme={{
                            indicator:
                                "mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-black bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none",
                        }}
                        className="h-full"
                    >
                        {imgs.map((img, index) => (
                            <div className="absolute h-full w-full overflow-hidden after:clear-both after:block after:content-['']">
                                <TECarouselItem
                                    itemID={index}
                                    className="relative float-left -mr-[100%] hidden h-full w-full !transform-none transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                                >
                                    <img
                                        src={img.image_path}
                                        className="block object-cover w-full h-full"
                                        alt="..."
                                    />
                                </TECarouselItem>
                            </div>
                        ))}
                    </TECarousel>
                ) : (
                    <div className="flex items-center justify-center h-full">
                        <p className="font-bold">لا يوجد صور</p>
                    </div>
                )}
            </div>

            {/* Details */}
            <div className="relative p-3 h-[40%]">
                {/* Tag */}
                {tag && (
                    <div className="absolute top-[10px] left-[10px] flex item-center justify-center border border-green-500 rounded-md">
                        <p className="text-[12px] px-3 py-1 text-green-500 font-bold">
                            جديد
                        </p>
                    </div>
                )}
                {/* Price */}
                <p className="font-bold text-[20px]">{price}</p>

                <div className="flex items-center mt-2">
                    {/* Property Type */}
                    <p className="pl-2 text-[16px] font-[500] border-l border-gray-300">
                        {propertyType}
                    </p>

                    {/* Bedroom */}
                    <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        className="mr-1"
                    >
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M17.2929 18H7.70711L6.85355 18.8536C6.65829 19.0488 6.34171 19.0488 6.14645 18.8536C5.95118 18.6583 5.95118 18.3417 6.14645 18.1464L6.29289 18H6C4.89543 18 4 17.1046 4 16V15C4 13.8954 4.89543 13 6 13H7.26756C7.09739 12.7058 7 12.3643 7 12C7 10.8954 7.89543 10 9 10H11C11.5973 10 12.1335 10.2619 12.5 10.6771C12.8665 10.2619 13.4027 10 14 10H16C17.1046 10 18 10.8954 18 12C18 12.3643 17.9026 12.7058 17.7324 13H19C20.1046 13 21 13.8954 21 15V16C21 17.1046 20.1046 18 19 18H18.7071L18.8536 18.1464C19.0488 18.3417 19.0488 18.6583 18.8536 18.8536C18.6583 19.0488 18.3417 19.0488 18.1464 18.8536L17.2929 18ZM19 14H6C5.44772 14 5 14.4477 5 15V16C5 16.5523 5.44772 17 6 17H19C19.5523 17 20 16.5523 20 16V15C20 14.4477 19.5523 14 19 14ZM16 13C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H14C13.4477 11 13 11.4477 13 12C13 12.5523 13.4477 13 14 13H16ZM9 13H11C11.5523 13 12 12.5523 12 12C12 11.4477 11.5523 11 11 11H9C8.44772 11 8 11.4477 8 12C8 12.5523 8.44772 13 9 13ZM6 11.5C6 11.7761 5.77614 12 5.5 12C5.22386 12 5 11.7761 5 11.5V8.5C5 7.1384 5.9375 6 7.14706 6H17.8529C19.0625 6 20 7.1384 20 8.5V11.5C20 11.7761 19.7761 12 19.5 12C19.2239 12 19 11.7761 19 11.5V8.5C19 7.65246 18.4627 7 17.8529 7H7.14706C6.53732 7 6 7.65246 6 8.5V11.5Z"
                            fill="currentColor"
                        ></path>
                    </svg>
                    <p className="font-[500] pl-2 text-[16px] border-l border-gray-300">
                        {bedroom}
                    </p>

                    {/* Bathroom */}
                    <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        className="mr-1"
                    >
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M5.5 9.90832V7.4753C5.5 6.66051 6.16057 6 6.99513 6C7.82969 6 8.5 6.66051 8.5 7.4753V8.13266C8.5 8.40139 8.27687 8.61923 8.00162 8.61923C7.72638 8.61923 7.50324 8.40139 7.50324 8.13266V7.4753C7.50324 7.19796 7.2792 6.97314 6.99513 6.97314C6.71106 6.97314 6.49676 7.19796 6.49676 7.4753V9.90832H12.5C12.5 9.36869 12.9477 8.93124 13.5 8.93124H16.5C17.0523 8.93124 17.5 9.36869 17.5 9.90832H19.5C20.0523 9.90832 20.5 10.3458 20.5 10.8854V13.3281C20.5 15.1507 19.0407 16.6403 17.2014 16.7423L17.6351 17.166C17.8303 17.3568 17.8303 17.6661 17.6351 17.8569C17.4398 18.0477 17.1232 18.0477 16.9279 17.8569L15.7929 16.7479H8.48861L7.35355 17.8569C7.15829 18.0477 6.84171 18.0477 6.64645 17.8569C6.45118 17.6661 6.45118 17.3568 6.64645 17.166L7.0744 16.7479H7C5.067 16.7479 3.5 15.2168 3.5 13.3281V10.8854C3.5 10.3458 3.94772 9.90832 4.5 9.90832H5.5ZM13.5 9.90832V10.8854H16.5V9.90832H13.5ZM12.5 10.8854H4.5V13.3281C4.5 14.6772 5.61929 15.7708 7 15.7708H17C18.3807 15.7708 19.5 14.6772 19.5 13.3281V10.8854H17.5V13.8166C17.5 14.3563 17.0523 14.7937 16.5 14.7937H13.5C12.9477 14.7937 12.5 14.3563 12.5 13.8166V10.8854ZM13.5 10.8854V13.8166H16.5V12.8396H14.7092C14.4331 12.8396 14.2092 12.6208 14.2092 12.351C14.2092 12.0812 14.4331 11.8625 14.7092 11.8625H16.5V10.8854H13.5Z"
                            fill="currentColor"
                        ></path>
                    </svg>
                    <p className="font-[500] pl-2 text-[16px] border-l border-gray-300">
                        {bathroom}
                    </p>

                    {/* Area */}
                    <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        className="mr-1"
                    >
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M6 19.2563L7.14783 18.1236C7.34385 17.9292 7.66043 17.9304 7.85493 18.1263C8.04943 18.3222 8.04819 18.6386 7.85217 18.833L5.85217 20.8084C5.65723 21.0017 5.34277 21.0017 5.14783 20.8084L3.14783 18.833C2.95181 18.6386 2.95057 18.3222 3.14507 18.1263C3.33957 17.9304 3.65615 17.9292 3.85217 18.1236L5 19.2563V9.6821L3.85217 10.8148C3.65615 11.0092 3.33957 11.008 3.14507 10.8121C2.95057 10.6162 2.95181 10.2998 3.14783 10.1054L5.14783 8.13006C5.34277 7.93677 5.65723 7.93677 5.85217 8.13006L7.85217 10.1054C8.04819 10.2998 8.04943 10.6162 7.85493 10.8121C7.66043 11.008 7.34385 11.0092 7.14783 10.8148L6 9.6821V19.2563ZM9.70978 5.99806L10.8433 7.14514C11.0378 7.34104 11.0365 7.65741 10.8405 7.85179C10.6445 8.04616 10.3279 8.04492 10.1334 7.84902L8.15674 5.85032C7.96332 5.65551 7.96332 5.34125 8.15674 5.14644L10.1334 3.14773C10.3279 2.95184 10.6445 2.9506 10.8405 3.14497C11.0365 3.33935 11.0378 3.65572 10.8433 3.85162L9.70978 4.9987H19.2902L18.1567 3.85162C17.9622 3.65572 17.9635 3.33935 18.1595 3.14497C18.3555 2.9506 18.6721 2.95184 18.8666 3.14773L20.8433 5.14644C21.0367 5.34125 21.0367 5.65551 20.8433 5.85032L18.8666 7.84902C18.6721 8.04492 18.3555 8.04616 18.1595 7.85179C17.9635 7.65741 17.9622 7.34104 18.1567 7.14514L19.2902 5.99806H9.70978ZM21 19.0013C21 20.1052 20.1046 21 19 21H11C9.89543 21 9 20.1052 9 19.0013V11.0065C9 9.90263 9.89543 9.00778 11 9.00778H19C20.1046 9.00778 21 9.90263 21 11.0065V13.0052H20V11.0065C20 10.4546 19.5523 10.0071 19 10.0071H11C10.4477 10.0071 10 10.4546 10 11.0065V19.0013C10 19.5532 10.4477 20.0006 11 20.0006H19C19.5523 20.0006 20 19.5532 20 19.0013H21ZM21 17.0026H20V15.0039H21V17.0026Z"
                            fill="currentColor"
                        ></path>
                    </svg>
                    <p className="font-[500] text-[16px]">
                        {area}{" "}
                        <span>
                            م<sup>2</sup>
                        </span>
                    </p>
                </div>

                {/* Address */}
                {address && (
                    <div className="flex items-center mt-2">
                        <i className="fa-solid fa-location-dot text-[16px]"></i>
                        <p className="mr-2 text-[16px] font-medium">
                            {address.country}
                            {(address.governorate || address.city) && (
                                <>
                                    <span className="mx-1">|</span>
                                    {address.governorate ?? ""}
                                    {address.city && (
                                        <>
                                            <span className="mx-1">|</span>
                                            {address.city}
                                        </>
                                    )}
                                </>
                            )}
                        </p>
                    </div>
                )}

                {/* Advance Amount */}
                {advanceAmount && (
                    <div className="flex items-center bg-blue-100 text-blue-500 p-2 rounded w-fit mt-2 text-[10px]">
                        <i className="fa-solid fa-money-bills ml-2"></i>
                        <p>
                            <span className="font-[500]">مقدم :</span>
                            <span>{advanceAmount}</span>
                        </p>
                    </div>
                )}

                {/* Contact Section */}
                <div className="group py-1 hover:py-2 absolute bottom-[10px] left-[15px] w-[40px] z-[201] flex flex-col justify-center items-center bg-sky-200 rounded-md transition-all duration-300 ease-in-out translate-y-[83%] hover:translate-y-0 hover:bg-blue-100 cursor-pointer">
                    {/* Main Share Button Icon */}
                    <span className="py-1 text-gray-800 group-hover:hidden">
                        <i className="fa-solid fa-paper-plane text-sky-500"></i>
                    </span>

                    {/* Whatsapp Icon */}
                    <div className="py-1 opacity-0 group-hover:opacity-100 group-hover:translate-x-0 transition duration-300 delay-300 transform -translate-x-full">
                        <a
                            href="#"
                            className="text-white text-gray-800 hover:bg-green-500 transition duration-200 flex items-center justify-center w-[28px] h-[28px] rounded-md bg-green-400"
                        >
                            <i className="fa-brands fa-whatsapp"></i>
                        </a>
                    </div>

                    {/* Email Icon */}
                    <div className="py-1 opacity-0 group-hover:opacity-100 group-hover:translate-x-0 transition duration-300 delay-500 transform -translate-x-full">
                        <a
                            href="#"
                            className="text-white text-gray-800 hover:bg-red-500 transition duration-200 flex items-center justify-center w-[28px] h-[28px] rounded-md bg-red-400 text-[16px]"
                        >
                            <i className="fa-regular fa-envelope"></i>
                        </a>
                    </div>

                    {/* Instagram Icon */}
                    <div className="py-1 opacity-0 group-hover:opacity-100 group-hover:translate-x-0 transition duration-300 delay-700 transform -translate-x-full">
                        <a
                            href="#"
                            className="text-white text-gray-800 hover:bg-blue-500 transition duration-200 flex items-center justify-center w-[28px] h-[28px] rounded-md bg-blue-400 text-[16px]"
                        >
                            <i className="fa-solid fa-share-nodes"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default PropertyCard;

export default function mohamed() {

    // { { --Make Dropdpwn Category Hidden When click Out Dropdown-- } }

    const dropdownWrapperCategory = document.getElementById('dropdownWrapperCategory');
    const toggleDropdownCategory = document.getElementById('toggleDropdownCategory');
    const dropdownButtonCategory = document.getElementById('dropdownButtonCategory');
    const dropdownMenuCategory = document.getElementById('dropdownMenuCategory');
    const buttonText = document.getElementById('buttonTextCategory');
    const dropdownArrow = document.getElementById('dropdownArrow');
    const resetSearch = document.getElementById('resetSearchCategory');
    const hideButtonCategory = document.getElementById('okCategory');

    // Function to set the default or selected option text
    function setDefaultOption() {
        // const storedData = JSON.parse(localStorage.getItem('search')) || {};
        const defaultOption = "تحديد الفئة";
        buttonText.textContent = defaultOption;


        // Highlight the active option
        const options = dropdownMenuCategory.querySelectorAll('button');
        options.forEach(option => {
            if (option.getAttribute('data-option') === defaultOption) {
                option.setAttribute('active', 'true');
                option.classList.add('active-option');
            } else {
                option.removeAttribute('active');
                option.classList.remove('active-option');
            }
        });
    }

    // Set default option on page load
    setDefaultOption();

    // Detect clicks outside the dropdown
    document.addEventListener('click', function (event) {
        if (!dropdownWrapperCategory.contains(event.target)) {
            toggleDropdownCategory.checked = false; // Hide the dropdown
            dropdownArrow.classList.remove('rotate-180'); // Reset arrow rotation
        }
    });

    // Update button text, localStorage, and arrow rotation on selection
    dropdownMenuCategory.addEventListener('click', function (event) {
        if (event.target.tagName === 'BUTTON') {
            const selectedOption = event.target.getAttribute('data-option');
            buttonText.textContent = selectedOption;

            // Remove active attribute from all options
            dropdownMenuCategory.querySelectorAll('button').forEach(option => {
                option.removeAttribute('active');
                option.classList.remove('active-option');
            });

            // Set active attribute on the selected option
            event.target.setAttribute('active', 'true');
            event.target.classList.add('active-option');

            let searchData = localStorage.getItem('search');
            if (searchData) {
                searchData = JSON.parse(searchData);
                searchData.category = selectedOption;
                localStorage.setItem('search', JSON.stringify(searchData));
            } else {
                const searchData = {
                    category: selectedOption
                };
                localStorage.setItem('search', JSON.stringify(searchData));
            }

            // Optionally, keep the dropdown open or close it
            // toggleDropdownCategory.checked = false; // Uncomment to close dropdown after selection
            dropdownArrow.classList.remove('rotate-180'); // Reset arrow rotation
        }
    });

    // Toggle dropdown and arrow rotation
    dropdownButtonCategory.addEventListener('click', function () {
        dropdownArrow.classList.toggle('rotate-180');
    });

    resetSearch.addEventListener('click', function () {
        let searchData = localStorage.getItem('search');
        if (searchData) {
            searchData = JSON.parse(searchData);
            // Remove the category field
            if (searchData.category) {
                delete searchData.category;
            }
            // Save the updated search object back to localStorage
            localStorage.setItem('search', JSON.stringify(searchData));
        }
        setDefaultOption();
    })

    hideButtonCategory.addEventListener('click', function () {
        toggleDropdownCategory.checked = false; // Hide the dropdown
        dropdownArrow.classList.remove('rotate-180'); // Reset arrow rotation
    })

}
// ==============================================================================
// { { --Build an autocomplete search bar-- } }

// let countries = [
//     @forelse($addresses as $address)
//             {
//         name: "{{ trim(($address->country ?? '') . ' - ' . ($address->governorate ?? '') . ' - ' . ($address->city ?? '') . ' - ' . ($address->street ?? '')) }}",
//     },
//     @empty
//     // You can leave this part empty or provide a fallback if no addresses are available
//     @endforelse
// ];

// function onkeyUp(e) {
//     let keyword = e.target.value;
//     let dropdownEl = document.querySelector("#dropdown");
//     dropdownEl.classList.remove("hidden");
//     let filteredCountries = countries.filter((c) =>
//         c.name.toLowerCase().includes(keyword.toLowerCase())
//     );

//     renderOptions(filteredCountries);
// }

// document.addEventListener("DOMContentLoaded", () => {
//     // Check if 'search' exists in localStorage and set input value accordingly
//     let searchData = localStorage.getItem('search');
//     if (searchData) {
//         searchData = JSON.parse(searchData);
//         if (searchData.search_property) {
//             let input = document.querySelector("#autocompleteInput");
//             input.value = searchData.search_property; // Set the input value from localStorage
//         }
//     }

//     renderOptions(countries);
// });

// function renderOptions(options) {
//     let dropdownEl = document.querySelector("#dropdown");

//     let newHtml = ``;

//     options.forEach((country) => {
//         newHtml += `<div
//         onclick="selectOption('${country.name}')"
//         class="px-5 py-3 border-b border-gray-200 text-stone-600 cursor-pointer hover:bg-slate-100 transition-colors">
//         ${country.name}
//         </div>`;
//     });

//     dropdownEl.innerHTML = newHtml;
// }

// function selectOption(selectedOption) {
//     hideDropdown();
//     let input = document.querySelector("#autocompleteInput");
//     input.value = selectedOption;

//     let searchData = localStorage.getItem('search');

//     if (searchData) {
//         searchData = JSON.parse(searchData);
//         // Update or add the search_property property
//         searchData.search_property = selectedOption;
//         localStorage.setItem('search', JSON.stringify(searchData));
//     } else {
//         const searchData = {
//             search_property: selectedOption
//         };
//         localStorage.setItem('search', JSON.stringify(searchData));
//     }
// }

// document.addEventListener("click", () => {
//     hideDropdown();
// });

// function hideDropdown() {
//     let dropdownEl = document.querySelector("#dropdown");
//     dropdownEl.classList.add("hidden");
// }


// //===================================================================
// // { { --Status Property-- } }

// Function to handle radio button changes
function handleRadioChange(event) {
    const radios = document.querySelectorAll('input[name="status-property"]');
    const selectedOption = event.target.value;

    // Add the active-option class to the checked label, remove from others
    radios.forEach(radio => {
        const label = document.querySelector(`label[for="${radio.id}"]`);
        if (radio.checked) {
            label.classList.add('active-option');
        } else {
            label.classList.remove('active-option');
        }
    });

    // Save the checked option to localStorage
    let searchData = localStorage.getItem('search');
    if (searchData) {
        searchData = JSON.parse(searchData);
        searchData.status_property = selectedOption;
        localStorage.setItem('search', JSON.stringify(searchData));
    } else {
        const searchData = {
            status_property: selectedOption
        };
        localStorage.setItem('search', JSON.stringify(searchData));
    }
}

// Function to load the saved radio state from localStorage
function loadSavedRadioState() {
    const searchData = localStorage.getItem('search');
    if (searchData) {
        const parsedData = JSON.parse(searchData);
        const savedStatus = parsedData.status_property;
        if (savedStatus) {
            const savedRadio = document.querySelector(`input[value="${savedStatus}"]`);
            if (savedRadio) {
                savedRadio.checked = true;
                const label = document.querySelector(`label[for="${savedRadio.id}"]`);
                label.classList.add('active-option');
            }
        }
    }
}

// Add event listeners to all radio buttons
const radioButtons = document.querySelectorAll('input[name="status-property"]');
radioButtons.forEach(radio => {
    radio.addEventListener('change', handleRadioChange);
});

// Load the saved radio state on page load
window.onload = loadSavedRadioState;


// //============================================================================
// { { --Type Property-- } }

const dropdownWrapperType = document.getElementById('dropdownWrapperType');
const toggleDropdownType = document.getElementById('toggleDropdownType');
const dropdownButtonType = document.getElementById('dropdownButtonType');
const dropdownMenuType = document.getElementById('dropdownMenuType');
const buttonTextType = document.getElementById('buttonTextType');
const dropdownArrowType = document.getElementById('dropdownArrowType');
const resetSearchType = document.getElementById('resetSearchType');
const hideButtonType = document.getElementById('okType');

// Function to set the default or selected option text
function setDefaultOption() {
    const storedData = JSON.parse(localStorage.getItem('search')) || {};
    const defaultOption = storedData.type_property || "تحديد نوع العقار";
    buttonTextType.textContent = defaultOption;


    // Highlight the active option
    const options = dropdownMenuType.querySelectorAll('button');
    options.forEach(option => {
        if (option.getAttribute('data-option') === defaultOption) {
            option.setAttribute('active', 'true');
            option.classList.add('active-option');
        } else {
            option.removeAttribute('active');
            option.classList.remove('active-option');
        }
    });
}

// Set default option on page load
setDefaultOption();

// Detect clicks outside the dropdown
document.addEventListener('click', function (event) {
    if (!dropdownWrapperType.contains(event.target)) {
        toggleDropdownType.checked = false; // Hide the dropdown
        dropdownArrowType.classList.remove('rotate-180'); // Reset arrow rotation
    }
});

// Update button text, localStorage, and arrow rotation on selection
dropdownMenuType.addEventListener('click', function (event) {
    if (event.target.tagName === 'BUTTON') {
        const selectedOption = event.target.getAttribute('data-option');
        buttonTextType.textContent = selectedOption;

        // Remove active attribute from all options
        dropdownMenuType.querySelectorAll('button').forEach(option => {
            option.removeAttribute('active');
            option.classList.remove('active-option');
        });

        // Set active attribute on the selected option
        event.target.setAttribute('active', 'true');
        event.target.classList.add('active-option');

        let searchData = localStorage.getItem('search');
        if (searchData) {
            searchData = JSON.parse(searchData);
            searchData.type_property = selectedOption;
            localStorage.setItem('search', JSON.stringify(searchData));
        } else {
            const searchData = {
                type_property: selectedOption
            };
            localStorage.setItem('search', JSON.stringify(searchData));
        }

        // Optionally, keep the dropdown open or close it
        // toggleDropdownType.checked = false; // Uncomment to close dropdown after selection
        dropdownArrowType.classList.remove('rotate-180'); // Reset arrow rotation
    }
});

// Toggle dropdown and arrow rotation
dropdownButtonType.addEventListener('click', function () {
    dropdownArrow.classList.toggle('rotate-180');
});

resetSearchType.addEventListener('click', function () {
    let searchData = localStorage.getItem('search');
    if (searchData) {
        searchData = JSON.parse(searchData);
        // Remove the category field
        if (searchData.type_property) {
            delete searchData.type_property;
        }
        // Save the updated search object back to localStorage
        localStorage.setItem('search', JSON.stringify(searchData));
    }
    setDefaultOption();
})

hideButtonType.addEventListener('click', function () {
    toggleDropdownType.checked = false; // Hide the dropdown
    dropdownArrowType.classList.remove('rotate-180'); // Reset arrow rotation
})


// //===========================================================================

// { { --Number of Rooms-- } }
const dropdownWrapperRooms = document.getElementById('dropdownWrapperRooms');
const toggleDropdownRooms = document.getElementById('toggleDropdownRooms');
const dropdownButtonRooms = document.getElementById('dropdownButtonRooms');
const dropdownMenuRooms = document.getElementById('dropdownMenuRooms');
const buttonTextRooms = document.getElementById('buttonTextRooms');
const dropdownArrowRooms = document.getElementById('dropdownArrowRooms');
const resetSearchRooms = document.getElementById('resetSearchRooms');
const hideButtonRooms = document.getElementById('okRooms');

// Initialize default option
function setDefaultOption() {
    const storedData = JSON.parse(localStorage.getItem('search')) || {};
    const bedrooms = storedData.bedrooms || 'عدد الغرف';
    const bathrooms = storedData.bathrooms || 'عدد الحمامات';
    buttonTextRooms.textContent = `${bedrooms} / ${bathrooms}`;

    // Highlight active options
    const bedroomOptions = dropdownMenuRooms.querySelectorAll('#bedroomOptions button');
    bedroomOptions.forEach(option => {
        if (option.getAttribute('data-option') === bedrooms) {
            option.setAttribute('active', 'true');
            option.classList.add('active-option');
        } else {
            option.removeAttribute('active');
            option.classList.remove('active-option');
        }
    });

    const bathroomOptions = dropdownMenuRooms.querySelectorAll('#bathroomOptions button');
    bathroomOptions.forEach(option => {
        if (option.getAttribute('data-option') === bathrooms) {
            option.setAttribute('active', 'true');
            option.classList.add('active-option');
        } else {
            option.removeAttribute('active');
            option.classList.remove('active-option');
        }
    });
}

// Set default option on page load
setDefaultOption();

// Detect clicks outside the dropdown
document.addEventListener('click', function (event) {
    if (!dropdownWrapperRooms.contains(event.target)) {
        toggleDropdownRooms.checked = false; // Hide the dropdown
        dropdownArrowRooms.classList.remove('rotate-180'); // Reset arrow rotation
    }
});

// Update button text, localStorage, and arrow rotation on selection
dropdownMenuRooms.addEventListener('click', function (event) {
    if (event.target.tagName === 'BUTTON') {
        const selectedOption = event.target.getAttribute('data-option');
        const optionType = event.target.parentElement.parentElement.id === 'bedroomOptions' ? 'bedrooms' :
            'bathrooms';

        let searchData = JSON.parse(localStorage.getItem('search')) || {};
        searchData[optionType] = selectedOption;
        localStorage.setItem('search', JSON.stringify(searchData));

        buttonTextRooms.textContent =
            `${searchData.bedrooms || 'عدد الغرف'} / ${searchData.bathrooms || 'عدد الحمامات'}`;

        // Remove active attribute from all options
        dropdownMenuRooms.querySelectorAll('button').forEach(option => {
            option.removeAttribute('active');
            option.classList.remove('active-option');
        });

        // Set active attribute on the selected option
        event.target.setAttribute('active', 'true');
        event.target.classList.add('active-option');

        // Optionally, keep the dropdown open or close it
        dropdownArrowRooms.classList.remove('rotate-180'); // Reset arrow rotation
    }
});

// Toggle dropdown and arrow rotation
dropdownButtonRooms.addEventListener('click', function () {
    dropdownArrowRooms.classList.toggle('rotate-180');
});

resetSearchRooms.addEventListener('click', function () {
    let searchData = JSON.parse(localStorage.getItem('search')) || {};
    delete searchData.bedrooms;
    delete searchData.bathrooms;
    localStorage.setItem('search', JSON.stringify(searchData));
    setDefaultOption();
})

hideButtonRooms.addEventListener('click', function () {
    toggleDropdownRooms.checked = false; // Hide the dropdown
    dropdownArrowRooms.classList.remove('rotate-180'); // Reset arrow rotation
})


// //====================================================

// // { { --Reset All Search-- } }

// resetAllSearch = document.querySelector('#resetAllSearch');

// resetAllSearch.addEventListener('click', function () {
//     localStorage.removeItem('search');
//     location.reload();
// });


// //===========================================================================
// // { { --Share Button-- } }

// const shareButton = document.querySelector('#share-button');

// shareButton.addEventListener('click', event => {
//     if (navigator.share) {
//         navigator.share({
//             title: 'KHAMASAT ',
//             url: 'a7777'
//         }).then(() => {
//             console.log('Thanks for sharing!');
//         })
//             .catch(console.error);
//     } else {
//         shareDialog.classList.add('is-open');
//     }
// });

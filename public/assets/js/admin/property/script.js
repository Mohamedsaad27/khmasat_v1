// show images will send to request under input 
const fileInput = document.getElementById('fileInput');
const fileList = document.getElementById('fileList');

fileInput.addEventListener('change', function () {
    fileList.innerHTML = '';
    fileList.classList.add('w-full', 'mt-[10px]');

    // Loop through the selected files
    Array.from(fileInput.files).forEach(file => {
        const fileItem = document.createElement('div');
        fileItem.classList.add('file-item', 'flex', 'items-center', 'mt-[10px]', 'dark:bg-gray-700',
            'bg-gray-50', 'p-2', 'rounded', 'w-full');

        // Display image preview
        const parentImg = document.createElement('div');
        const img = document.createElement('img');
        img.src = URL.createObjectURL(file); // Create a temporary URL for the image
        img.alt = file.name;
        parentImg.classList.add('w-[50px]', 'h-[50px]', 'ml-[10px]');
        img.classList.add('w-full', 'h-full', 'object-cover', 'rounded');

        // Display the file name
        const fileNameWrapper = document.createElement('div');
        fileNameWrapper.classList.add('truncate');
        fileNameWrapper.style.width = `calc(100% - 60px)`;
        const fileName = document.createElement('span');
        fileName.textContent = file.name;
        fileName.classList.add('text-gray-500', 'dark:text-gray-400', 'truncate');

        // Append file name to the wrapper and file item
        fileNameWrapper.appendChild(fileName);
        parentImg.appendChild(img);
        fileItem.appendChild(parentImg);
        fileItem.appendChild(fileNameWrapper);

        // Append the file item to the file list    
        fileList.appendChild(fileItem);
    });
});


/* =============== ♥_♥ =============== */


// show input discount when click on discountCheckbox
var priceParent = document.querySelector('.price-parent');
var price = document.querySelector('.price');
var discountCheckbox = document.getElementById('discount-checkbox');

function handleDiscount() {
    if (!discountCheckbox.checked) {
        price.classList.add('w-full');
        price.classList.remove('w-[49%]');

        // Remove discount element if it exists
        var existingDiscountElement = document.getElementById('discount-amount');
        if (existingDiscountElement) {
            existingDiscountElement.parentNode.remove();
        }
    } else {
        price.classList.remove('w-full');
        price.classList.add('w-[49%]');

        // Create and append the discount element if it doesn't exist
        if (!document.getElementById('discount-amount')) {
            var discountElement = document.createElement('div');
            discountElement.classList.add('w-[49%]');
            discountElement.innerHTML = `
            <label for="discount-amount"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">السعر بعد الخصم</label>
            <input type="number" name="price_after_dicount" id="discount-amount"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 transition duration-200"
                placeholder="ادخل السعر بعد الخصم " required>`;

            // Append the discount element to the parent
            priceParent.appendChild(discountElement);
        }
    }
}

// Run on page load
window.addEventListener('load', handleDiscount);

// Run when checkbox changes
discountCheckbox.addEventListener('change', handleDiscount);


/* =============== ♥_♥ =============== */


// show input installment when click on installmentCheckbox 
var installment = document.querySelector('.installment');
var installmentCheckbox = document.getElementById('installment-checkbox');

// Function to handle the installment input visibility
function handleInstallment() {
    if (!installmentCheckbox.checked) {
        // Remove installment input if it exists
        var existingInstallmentElement = document.getElementById('installment-amount');
        if (existingInstallmentElement) {
            existingInstallmentElement.parentNode.remove();
        }
    } else {
        // Create and append the installment input if it doesn't exist
        if (!document.getElementById('installment-amount')) {
            var installmentElement = document.createElement('div');
            installmentElement.innerHTML = `
            <label for="installment-amount"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">المقدم</label>
            <input type="number" name="installment_amount" id="installment-amount"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 transition duration-200"
                placeholder="ادخل المقدم " required>`;

            // Append the new element to the installment div
            installment.appendChild(installmentElement);
        }
    }
}

// Run on page load
window.addEventListener('load', handleInstallment);

// Run when checkbox changes
installmentCheckbox.addEventListener('change', handleInstallment);
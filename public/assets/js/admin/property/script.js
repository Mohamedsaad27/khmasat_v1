// show images will send to request under input 
const fileInput = document.getElementById('fileInput');
const fileList = document.getElementById('fileList');

fileInput.addEventListener('change', function () {
    // fileList.innerHTML = '';
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
var discountAmountParent = document.getElementsByClassName('discount-amount-parent')[0]; // Access the first element

function handleDiscount() {
    if (!discountCheckbox.checked) {
        price.classList.add('w-full');
        price.classList.remove('w-[49%]');

        // Hide discount input
        if (!discountAmountParent.classList.contains('hidden')) {
            discountAmountParent.classList.add('hidden');
        }
    } else {
        price.classList.remove('w-full');
        price.classList.add('w-[49%]');

        // Show discount input
        if (discountAmountParent.classList.contains('hidden')) {
            discountAmountParent.classList.remove('hidden');
        }
    }
}

// Run immediately
handleDiscount();

// Run when checkbox changes
discountCheckbox.addEventListener('change', handleDiscount);

/* =============== ♥_♥ =============== */

// show input installment when click on installmentCheckbox 
var installmentParent = document.querySelector('.installment-parent');
var installmentCheckbox = document.getElementById('installment-checkbox');

function handleInstallment() {
    if (!installmentCheckbox.checked) {
        installmentParent.classList.add('hidden');
    } else {
        installmentParent.classList.remove('hidden');
    }
}

// Run immediately
handleInstallment();
// Run when checkbox changes
installmentCheckbox.addEventListener('change', handleInstallment);
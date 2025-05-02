// Country code mapping
const countryCodes = {
    'ghana': '+233',
    'Ghana': '+233',
    'nigeria': '+234',
    'Nigeria': '+234',
    'ivory_coast': '+225',
    'Ivory Coast': '+225',
    'senegal': '+221',
    'Senegal': '+221',
    'togo': '+228',
    'Togo': '+228',
    'benin': '+229',
    'Benin': '+229',
    'liberia': '+231',
    'Liberia': '+231',
    'sierra_leone': '+232',
    'Sierra Leone': '+232',
    'burkina_faso': '+226',
    'Burkina Faso': '+226',
    'mali': '+223',
    'Mali': '+223',
    'guinea': '+224',
    'Guinea': '+224',
    'guinea_bissau': '+245',
    'Guinea-Bissau': '+245',
    'gambia': '+220',
    'The Gambia': '+220',
    'cape_verde': '+238',
    'Cape Verde': '+238',
    'niger': '+227',
    'Niger': '+227'
};

// Function to update phone number with country code
function updatePhoneNumber() {
    const locationSelect = document.getElementById('location');
    const phoneInput = document.getElementById('phone');
    
    if (locationSelect && phoneInput) {
        const selectedCountry = locationSelect.value;
        const countryCode = countryCodes[selectedCountry] || '';
        
        // Get current phone number without country code
        let currentNumber = phoneInput.value.trim();
        
        // Remove any existing country code
        Object.values(countryCodes).forEach(code => {
            if (currentNumber.startsWith(code)) {
                currentNumber = currentNumber.substring(code.length).trim();
            }
        });
        
        // Remove any remaining plus signs and leading spaces
        currentNumber = currentNumber.replace(/^\+/, '').trim();
        
        // Update phone number with new country code if we have one
        if (countryCode && currentNumber) {
            phoneInput.value = countryCode + ' ' + currentNumber;
        } else if (countryCode) {
            phoneInput.value = countryCode + ' ';
        }
    }
}

// Add event listener when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    const locationSelect = document.getElementById('location');
    if (locationSelect) {
        // Add event listeners
        locationSelect.addEventListener('change', updatePhoneNumber);
        
        // Also update on initial load if a country is selected
        if (locationSelect.value) {
            updatePhoneNumber();
        }
        
        // Focus handler for phone input
        const phoneInput = document.getElementById('phone');
        if (phoneInput) {
            phoneInput.addEventListener('focus', function() {
                if (!this.value && locationSelect.value) {
                    const countryCode = countryCodes[locationSelect.value];
                    if (countryCode) {
                        this.value = countryCode + ' ';
                    }
                }
            });
        }
    }
}); 
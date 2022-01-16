document.addEventListener("DOMContentLoaded", function(event) { 

    document.querySelectorAll('.servizioCheckbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {         
            var selectBox;   
            if (this.checked) {
                selectBox = this.parentElement.querySelector('.opCedBox');//.style.display = 'none';
                selectBox.classList.remove('d-none');
            } else {
                selectBox = this.parentElement.querySelector('.opCedBox');//.style.display = 'block';
                selectBox.classList.add('d-none');
            }
        });
    });
});



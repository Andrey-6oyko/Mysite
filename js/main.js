document.getElementById('order_form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Perform form validation (if needed)
    var form = event.target;
    
    if (form.checkValidity()) {
        // Create a FormData object from the form
        var formData = new FormData(form);
        
        // Send the form data using fetch
        fetch('orders_ajax.php', {
            method: 'POST', 
            
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert('Замовлення прийнято');
            form.reset();
        })
        .catch(error => {
            console.error('Помилка:', error);
            alert('Виникла помилка при відправленні замовлення.');
        });
    } else {
        form.reportValidity();
    }
});



    // JavaScript for burger menu toggle
console.log(jQuery().jquery);
$(document).on('click', '#burger', function(){
    $('.nav-menu').toggleClass('active');
})

    
document.addEventListener('DOMContentLoaded', function() {
    const configButtons = document.querySelectorAll('.kitsetup-config-box');

    configButtons.forEach(button => {
        button.addEventListener('click', function(event) {

            event.stopPropagation(); 
            
            const card = this.closest('.kitsetup-products_box');
            const isAlreadyVisible = card.classList.contains('config-visible');

            document.querySelectorAll('.kitsetup-products_box.config-visible').forEach(otherCard => {
                otherCard.classList.remove('config-visible');
            });

            if (!isAlreadyVisible) {
                card.classList.add('config-visible');
            }
        });
    });


    document.addEventListener('click', function(event) {

        const visibleCard = document.querySelector('.kitsetup-products_box.config-visible');

        if (!visibleCard) {
            return;
        }
        const isClickInsideCard = visibleCard.contains(event.target);

        if (!isClickInsideCard) {
            visibleCard.classList.remove('config-visible');
        }
    });
});
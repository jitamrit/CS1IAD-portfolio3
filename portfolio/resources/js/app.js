// import './bootstrap';


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


document.addEventListener('DOMContentLoaded', function () {
    // Modal functions
    window.showModal = function(name, cuisine, time, ingredients, instructions, user,desc,serv,diff) {
        document.getElementById('modalTitle').textContent = name;
        document.getElementById('modalCuisine').textContent = cuisine;
        document.getElementById('modalTime').textContent = time +"minutes";
        document.getElementById('modalIngredients').textContent = ingredients;
        document.getElementById('modalInstructions').textContent = instructions;
        document.getElementById('modalUser').textContent = user;
        document.getElementById('modalDesc').textContent = desc;
        document.getElementById('modalDiff').textContent = diff;
        document.getElementById('modalServ').textContent = serv;

        document.getElementById('detailModal').style.display = 'flex';

    };

    window.closeModal = function() {
        document.getElementById('detailModal').style.display = 'none';
    };

    window.openRegister = function() {
        document.getElementById('registerModal').style.display = 'flex';
    };

    window.closeRegister = function() {
        document.getElementById('registerModal').style.display = 'none';
    };

    // Search filter
    const searchBox = document.getElementById('searchBox');
    if (searchBox) {
        searchBox.addEventListener('input', function () {
            const value = this.value.toLowerCase();
            document.querySelectorAll('.recipe-card').forEach(card => {
                const text = card.textContent.toLowerCase();
                card.style.display = text.includes(value) ? 'block' : 'none';
            });
        });
    }

    // Close modals on click outside
    window.addEventListener('click', function (event) {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = 'none';
        }
    });


});

document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("rating-modal");
    const closeModal = document.getElementById("close-modal");
    const closeLink = document.getElementById("fechar-rating");

  
    modal.style.display = "block"; 

    document.querySelectorAll('.star-rating input').forEach(input => {
        input.addEventListener('change', function() {
            const rating = this.value;
            const starRating = this.closest('.star-rating');
    
            starRating.querySelectorAll('label').forEach((label, index) => {
                if (index < rating) {
                    label.style.color = '#FF8C00'; 
                } else {
                    label.style.color = '#ccc'; 
                }
            });
        });
    });
});

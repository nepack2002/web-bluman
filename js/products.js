document.addEventListener('DOMContentLoaded', function() {
    const categoryButtons = document.querySelectorAll('.items .item');
    
    categoryButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            const category = this.getAttribute('data-category');
            filterProducts(category);

            // Xóa lớp active từ tất cả các nút
            categoryButtons.forEach(function(btn) {
                btn.classList.remove('active');
            });

            // Thêm lớp active vào nút được chọn
            this.classList.add('active');
        });
    });

    // Hàm lọc và hiển thị sản phẩm theo danh mục
    function filterProducts(category) {
        const products = document.querySelectorAll('.product');
        products.forEach(function(product) {
            const productCategory = product.getAttribute('data-category');
            if (category === 'all' || productCategory === category) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    }

    filterProducts('all');
});

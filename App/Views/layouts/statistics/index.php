<div class="col-4 m-auto mt-5">
    <canvas id="productChart" width="400" height="400"></canvas>
</div>
<script>
    // Lấy dữ liệu từ PHP và chuyển đổi thành JavaScript object
    var data = <?php echo json_encode($data); ?>;
    // Tạo mảng chứa các nhãn danh mục và số lượng sản phẩm tương ứng
    var labels = [];
    var counts = [];
    // Duyệt qua dữ liệu và điền vào mảng
    data.forEach(function(item) {
        labels.push(item.category_name);
        counts.push(item.product_count);
    });
    // Vẽ biểu đồ
    var ctx = document.getElementById('productChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Số lượng sản phẩm',
                data: counts,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
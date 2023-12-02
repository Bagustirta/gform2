<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Sembunyikan semua tabel saat halaman pertama dimuat
    $(".admin-table").hide();

    // Tampilkan tabel yang sesuai ketika menu di sidebar diklik
    $(".list-group-item").click(function() {
        $(".admin-table").hide();
        var target = $(this).attr("href");
        $(target).show();
    });
});
</script>
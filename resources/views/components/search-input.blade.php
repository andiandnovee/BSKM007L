<form id="search-form" method="GET" action="{{ $action }}">
    <input type="hidden" name="table" value="{{ $table }}">
    <input type="hidden" name="fields" value="{{ $fields }}">
    <input type="text" id="search-input" name="search" placeholder="{{ $placeholder }}" autocomplete="off">
    <button type="submit" style="display: none;">Cari</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let searchInput = document.getElementById('search-input');
        let searchForm = document.getElementById('search-form');
        let timeout = null;

        searchInput.addEventListener('keyup', function() {
            let searchQuery = searchInput.value.trim();
            if (searchQuery.length >= 3) {
                clearTimeout(timeout);
                timeout = setTimeout(function() {
                    searchForm.submit();
                }, 500);
            }
        });
    });
</script>

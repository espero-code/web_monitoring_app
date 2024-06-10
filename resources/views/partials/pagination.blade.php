<div class="d-flex justify-content-between">
    <form action="" method="get" id="paginationForm" >
        <select name="totalPerPage" onchange="updateUrlParam('totalPerPage', this.value)" class="form-control" id="totalPerPage">
            <option value="10" {{ $totalPerPage == 10 ? 'selected' : '' }}>10</option>
            <option value="20" {{ $totalPerPage == 20 ? 'selected' : '' }}>20</option>
            <option value="50" {{ $totalPerPage == 50 ? 'selected' : '' }}>50</option>
            <option value="100" {{$totalPerPage == 100 ? 'selected' : '' }}>100</option>
        </select>
    </form>
    <div class="page-links">
        {{ $datas->links('pagination::bootstrap-5') }}
    </div>

</div>
<script>
    function updateUrlParam(key, value) {
        const url = new URL(window.location.href);
        url.searchParams.set(key, value);
        window.location.href = url.href;
    }
</script>

@if ($paginator->hasPages())
<div class="d-flex justify-content-center align-items-center mt-5">
    <div class="mx-auto">Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} characters</div>
</div>
@endif 
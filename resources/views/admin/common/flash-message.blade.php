{{-- Hiển thị thông tin trạng thái tạo bài viết --}}
@if (session('status'))
<div class="alert alert-info">{{session('status')}}</div>
@endif
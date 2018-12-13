@extends('layouts.user')
@section('title', 'Trang chủ')
@section('content')

@if($user->is_test == null)
<div id="isTestModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content panel-info">
      <div class="modal-header panel-heading">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Chào mừng bạn đến với website</h4>
      </div>
      <div class="modal-body">
        <h3>Kiểm tra đánh giá năng lực</h3>
        <p>Đây là bài kiểm tra nhỏ để xác định nhanh năng lực hiện tại của bạn, giúp chúng mình đưa ra những bài ôn luyện phù hợp với bạn</p>
        <p>Bài kiểm tra này sẽ có <b>15 câu (5 dễ, 5 trung bình, 5 khó)</b></p>
        <p>Bạn có <b>30ph để hoàn thành bài thi</b>, hãy cố gắng làm hết sức có thể nhé.</p><br/>
        <p> >> Bắt đầu ngay thôi...</p>
      </div>
      <div class="modal-footer">
      <a href="{{url('home/un-test')}}">Không làm phiền nữa :( </a> &nbsp; &nbsp; &nbsp;
        <button type="button" class="btn btn-danger" data-dismiss="modal">Để khi khác</button>
        <a href="#"><button type="button" class="btn btn-success">Làm ngay</button></a>
      </div>
    </div>

  </div>
</div>
@endif

@stop
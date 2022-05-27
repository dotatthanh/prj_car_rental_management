@extends('layouts.master')

@section('title') Trang Tin Tức @endsection

@section('content')

<div class="header">
  <h2 style=" font-size : 60px;">Trang Tin Tức</h2>
</div>

<div class="row">
  <div class="leftcolumn" style=" width: 1200px;">
    <div class="card">
      <h2 style="font-size: 25px; text-align: center;">Kinh nghiệm tìm phòng trọ: Sinh viên nên tìm phòng trọ qua kênh nào</h2>
      <h5 id="date">Thời gian đăng tin: 20/5/2022</h5>
      <img  style="height:400px; width : 100%;" src="https://feeldecor.com.vn/wp-content/uploads/2017/05/thiet-ke-thi-cong-noi-that-phong-ngu_feeldecor-16-950x525.jpg">
      <p>Thị trường phòng trọ phát triển, các bạn sinh viên sẽ có thể dễ dàng tìm phòng hơn với vô vàng kênh tìm phòng. Tuy nhiên, không phải kênh tìm phòng nào cũng tốt, vậy hãy cùng tìm hiểu xem đâu là những kênh tìm phòng hiệu quả mà các bạn sinh viên có thể hướng đến nhé.</p>
        <button style="width: 200px;">Read more...</button>
    </div>

    <div class="card">
      <h2 style="font-size: 25px; text-align: center;">Kinh nghiệm tìm phòng trọ: Nên ở trọ với ai ?</h2>
      <h5 id="date">Thời gian đăng tin: 20/5/2022</h5>
      <img  style="height:400px; width : 100% ; float: center;" src="https://blog.ohanaliving.vn/content/images/size/w1000/2020/08/22473623_1531407276896998_595602691_o.jpg">
      <p>Ở với ai, câu hỏi mà bạn tìm trọ nào cũng đắn đo khi tìm trọ, hãy cùng  phân tích xem những lựa chọn các bạn có khi tìm phòng trọ nhé.  Việc ở với ai là điều sẽ ảnh hưởng đến mọi khía cạnh trong việc tìm trọ của bạn từ chi phí nhà trọ, loại hình nhà trọ và khu vực bạn sẽ sinh sống. Các lựa chọn ở đây chính là ở một mình, ở với bạn, ở với người thân hay ở ghép.</p>
      <button style="width: 200px;">Read more...</button>
    </div>

    <div class="card">
      <h2 style="font-size: 25px; text-align: center;">Kinh nghiệm tìm phòng trọ: Các bước tìm trọ từ A đến Z</h2>
      <h5 id="date">Thời gian đăng tin: 10/5/2022</h5>
      <img  style="height:400px; width : 100% ; float: center;" src="https://blog.ohanaliving.vn/content/images/size/w1000/2020/08/alexandra-gorn-JIUjvqe2ZHg-unsplash.jpg">
      <p>Tìm phòng chưa bao giờ là một công việc đơn giản cho dù đối với những bạn đã có kinh nghiệm tìm phòng trọ trong thời gian dài. Nay sẽ mang đến cho các bạn một quy trình cụ thể để các bạn có thể biết được nên làm gì trong quá trình tìm phòng để có thể có được căn phòng ưng ý nhất.</p>
      <button style="width: 200px;">Read more...</button>
    </div>

    <div class="card">
      <h2 style="font-size: 25px; text-align: center;">Kinh nghiệm tìm phòng trọ: Cần tìm hiểu những gì trước khi tìm phòng trọ ?</h2>
      <h5 id="date">Thời gian đăng tin: 4/5/2022</h5>
      <img  style="height:400px; width : 100% ; float: center;" src="https://blog.ohanaliving.vn/content/images/size/w1000/2020/08/chastity-cortijo-M8iGdeTSOkg-unsplash.jpg">
      <p>Khi đi xem trọ, đặc biệt đối với các bạn sinh viên lần đầu xem trọ, các bạn cần có sự chuẩn bị kỹ càng, về việc hiểu rõ bản thân cần gì, nên tìm phòng như thế nào và mình sẽ thuê phòng như thế nào. Vậy cần chuẩn bị những gì để có thể bắt đầu đi tìm trọ, hãy để Ohana chỉ cho nhé.</p>
      <button style="width: 200px;">Read more...</button>
    </div>
  </div>
 
</div>






<style>
  #date{
    text-align: center;
  }

/* Header/Blog Title */
.header {
  padding: 30px;
  font-size: 40px;
  text-align: center;
  background: white;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {
  float: left;
  left : 800px;
  width: 60%;
}


/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 80%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
  background-color: white;
  padding: 20px;
  margin-top: 20px;
  width: 1000px;
  left : 500px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {
    width: 100%;
    padding: 0;
  }
}
</style>
@endsection

@push('js')
@endpush

@push('css')
@endpush
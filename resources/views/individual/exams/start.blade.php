<x-common.layout>
    @if(!$exam->questions->isEmpty())
       <div class="row question-container">
            <div class="col-lg-9">
                <form id="quiz-form">
                    @csrf
                    @foreach ($exam->questions as $question)
                        <div class="card question mb-2">
                            <div class="card-head">
                                <h5 class="font-semi-bold question-title">{{$question->name}}</h5>
                            </div>
                            <div class="card-body">
                                @if(!$question->answers->isEmpty())
                                    <div class="question-answer d-lg-flex gap-2">
                                       @foreach ($question->answers as $answer)
                                        <div class="question-options">
                                            <input type="radio" 
                                                  id="q-{{$question->id}}-answer-{{$answer->id}}" 
                                                  name="question-{{$question->id}}" 
                                                  value="{{$answer->id}}" />
                                            <label for="q-{{$question->id}}-answer-{{$answer->id}}">
                                                {{$answer->title}}
                                            </label>
                                        </div>  
                                    @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <div class="question-footer mt-3">
                        <div class="d-flex align-items-center justify-content-between"> 
                            <a class="btn btn-white" href="{{route('individual.exams')}}">إلغاء </a>
                            <button type="button" class="btn btn-primary px-4 @disabled($exam_answer)" id="submit-exam">تسليم الاختبار</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-3"> 
              <div class="pannel">
                <h5 class="mb-3 font-bold">حالة التقدم</h5>
                <hr/>
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <h6 class="font-light">نسبة اكتمال الاختبار</h6>
                  <h6 class="font-bold" id="progress-text">0%</h6>
                </div>
                <div class="progress mb-3">
                  <div class="progress-bar" id="progress-bar" role="progressbar" style="width: 0%" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <hr/>
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <h6 class="font-light">عدد الاسئلة</h6>
                  <h6 class="font-bold" id="question-count">0/{{$exam->questions->count()}}</h6>
                </div>
              </div>
            </div>
          </div>
    @endif

    <!-- start:: modal -->
    <div class="modal fade" id="QuizAnswerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border-0">
            <div class="modal-body p-0">
              <div class="row"> 
                <div class="col-12">
                  <div class="text-center p-4 p-lg-5"> 
                    <div class="circle-progress mb-3" id="graph" data-percent="0">
                        <div class="total-result font-semi-bold"> 0 / <span class="ps-1"> 0 </span></div>
                    </div>
                    <h3 class="font-semi-bold mb-3" id="quiz-result-text">لقد أتممت الاختبار بنجاح!</h3>
                    <h6>يمكنك الاطلاع على الأسئلة التي لم تُجب عنها بشكل صحيح لمراجعتها.</h6>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="modal-footer d-flex align-items-center justify-content-between"> 
                    <a class="btn btn-white" href="{{route('individual.exams.result', $exam)}}">الاطلاع على الأسئلة</a>
                    <a class="btn btn-primary px-3" href="{{route('individual.exams')}}">الرجوع الي صفحة الاختبارات</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div><!-- end:: modal -->

@section('scripts')
<script>
$(document).ready(function(){

    $('input[type=radio]').on('change', function(){
        let answered = $('input[type=radio]:checked').length;
        let total = {{$exam->questions->count()}};
        let percent = Math.round(answered / total * 100);

        $('#progress-text').text(percent + '%');
        $('#progress-bar').css('width', percent + '%');
        $('#question-count').text(answered + '/' + total);
    });

    $('#submit-exam').click(function(e){
        e.preventDefault();

        let answers = {};
        $('.question-container input[type=radio]:checked').each(function(){
            let questionId = $(this).attr('name').split('-')[1];
            let answerId = $(this).val(); 
            answers[questionId] = answerId;
        });

        $.ajax({
            url: "{{ route('individual.exams.submit', $exam->id) }}",
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                answers: answers
            },
            success: function(response){
                if(response.success){
                    let percent = Math.round((response.score / response.total) * 100);
                    
                    $('.progress-bar').css('width', percent + '%').attr('aria-valuenow', percent);
                    $('.total-result').text(response.score + ' / ' + response.total);

                    $('#QuizAnswerModal').modal('show');
                    $('#QuizAnswerModal .total-result').text(response.score + ' / ' + response.total);
                }else if(response.success == false){
                  toastr.error(response.message);
                }

            },
            error: function(xhr){
                toastr.error(xhr.responseText);
            }
        });
    });

});
</script>
@endsection

</x-common.layout>

<x-common.layout>
  <div class="row question-container">
    <div class="col-lg-9">
      @foreach ($exam->questions as $question)
        <div class="card question mb-2">
          <div class="card-head">
            <h5 class="font-semi-bold question-title">{{ $question->name }}</h5>
          </div>
          <div class="card-body">
            @if(!$question->answers->isEmpty())
              <div class="question-answer d-lg-flex gap-2">
               @foreach ($question->answers as $answer)
                  @php
                    // Get user's submitted answer for this question
                    $userAnswer = $exam->examAnswers->firstWhere('question_id', $question->id);
                    $class = '';

                    if ($userAnswer) {
                        if ($userAnswer->answer_id == $answer->id) {
                            // Apply class based on correctness
                            $class = $userAnswer->is_correct ? 'answer-correct' : 'answer-selected';
                        }
                    }
                  @endphp
                  <div class="question-options {{ $class }}">
                    <label>{{ $answer->title }}</label>
                  </div>
                @endforeach
              </div>
            @endif
          </div>
        </div>
      @endforeach
    </div>

    <div class="col-lg-3"> 
      <div class="pannel">
        <h5 class="mb-3 font-bold">نتيجة الاختبار</h5>
        <hr/>
        <div class="d-flex align-items-center justify-content-between mb-2">
          <h6 class="font-light">نسبة النجاح</h6>
          <h6 class="font-bold">75%</h6> <!-- You can replace with dynamic value -->
        </div>
        <div class="progress mb-3">
          <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <hr/>
        <div class="d-flex align-items-center justify-content-between mb-2">
          <h6 class="font-light">النتيجة</h6>
          <h6 class="font-bold">90 / 120</h6> <!-- You can replace with dynamic value -->
        </div>
      </div>
    </div>
  </div>

  <div class="question-footer">
    <div class="d-flex align-items-center justify-content-between">
      <a class="btn btn-white" href="{{ route('individual.exams') }}">إلغاء</a>
      <a class="btn btn-primary px-4" href="{{ route('individual.exams') }}">الرجوع الي صفحة الاختبارات</a>
    </div>
  </div>
</x-common.layout>

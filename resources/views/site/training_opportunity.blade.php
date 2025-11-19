<x-site.layout :internal="false">
       <!-- start:: section -->
        <section class="section section-bg-light">
          <div class="container">
            <div class="row mb-4">
              <div class="col-lg-8">
                <div class="row"> 
                  <div class="col-12"> 
                    <ol class="breadcrumb">
                      <div class="breadcrumb-item"><a href=""> طلبات العمل</a></div>
                      <div class="breadcrumb-item">{{$training_opportunity->title}}</div>
                    </ol>
                  </div>
                </div>
                <div class="row mb-4"> 
                  <div class="col-12">
                    <div class="pannel">
                      <h2 class="mb-3 font-semi-bold font-24">{{$training_opportunity->title}}</h2>
                      <h6 class="text-gray">{{$training_opportunity->short_description}}</h6>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <ul class="nav nav-pills mb-3 gap-3" id="pills-tab" role="tablist">
                      <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-1" type="button" role="tab">المهام والمسؤوليات</button>
                      </li>
                      <li class="nav-item">
                        <button class="nav-link " data-bs-toggle="pill" data-bs-target="#tab-2" type="button" role="tab">شروط القبول</button>
                      </li>
                      <li class="nav-item">
                        <button class="nav-link " data-bs-toggle="pill" data-bs-target="#tab-3" type="button" role="tab">المزايا والمكافأة</button>
                      </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                      <div class="tab-pane fade show active" id="tab-1">
                        <div class="card">
                          <div class="card-head">
                            <h5 class="font-semi-bold mb-2"> المهام والمسؤوليات</h5>
                          </div>
                          <div class="card-body">
                            <ul class="description-list">
                              {!! $training_opportunity->responsibilities !!}
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="tab-3">
                        <div class="card">
                          <div class="card-head">
                            <h5 class="font-semi-bold mb-2"> شروط القبول</h5>
                          </div>
                          <div class="card-body">
                            <ul class="description-list">
                              {!! $training_opportunity->conditions !!}
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="tab-2">
                        <div class="card">
                          <div class="card-head">
                            <h5 class="font-semi-bold mb-2"> المزايا والمكافأة</h5>
                          </div>
                          <div class="card-body">
                            <ul class="description-list">
                             {!! $training_opportunity->features !!}
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4"> 
                <div class="pannel">
                  <h5 class="mb-3 font-bold">تفاصيل التدريب</h5>
                  <hr/>
                  <ul class="description-list-2">
                    <li class="d-flex align-items-start"><span class="description-icon me-2"><img src="../assets/images/location.svg" alt=""/></span>{{$training_opportunity->location}}</li>
                    <li class="d-flex align-items-start"><span class="description-icon me-2"><img src="../assets/images/briefcase.svg" alt=""/></span> {{$training_opportunity->attendance}}</li>
                    <li class="d-flex align-items-start"><span class="description-icon me-2"><img src="../assets/images/calendar.svg" alt=""/></span>{{$training_opportunity->duration}}</li>
                    <li class="d-flex align-items-start"><span class="description-icon me-2"><img src="../assets/images/riyal-circular.svg" alt=""/></span> {{$training_opportunity->salaray}}</li>
                    <li class="d-flex align-items-start"><span class="description-icon me-2"><img src="../assets/images/user2.svg" alt=""/></span> الذكور فقط لهذه الوظيفة.</li>
                  </ul>
                  <hr/><a class="btn btn-primary w-100" href="" data-bs-toggle="modal" data-bs-target="#profileCompletionFormModal">قدّم الآن </a>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end:: section -->  
</x-site.layout>
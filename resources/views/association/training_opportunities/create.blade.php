<x-common.layout>
           <div class="row mb-4">
            <div class="col-12">
              <div class="row"> 
                <div class="col-12"> 
                  <ol class="breadcrumb">
                    <div class="breadcrumb-item"><a href="{{route('association.training-opportunities.index')}}"> استكشف الفرص التعاونية</a></div>
                    <div class="breadcrumb-item">نشر تدريب تعاوني جديد</div>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="pannel">
                <div class="row mb-4">
                  <div class="col-12">
                    <h3 class="font-bold mb-3"> نشر تدريب تعاوني جديد</h3>
                    <h6>أضف تفاصيل عن التدريب التعاوني لعرضها في المنصة، ليتمكن الباحثون عن التدريب من الاطلاع عليها والتقديم.</h6>
                  </div>
                </div>
                <hr/>
                <div class="row mb-4">
                  <div class="col-12">
                    <form action="{{ route('association.training-opportunities.store') }}" method="POST">
                        @csrf
                      <div class="row"> 
                        <div class="col-12"> 
                          <div class="form-group"> 
                            <label class="mb-2"> مسمى فرصة التدريب التعاوني <span class="text-danger"> *</span></label>
                            <input class="form-control" type="text" placeholder="مثال: مشرف حجاج، منظم صفوف، مرشد ميداني…" name="title" value="{{old('title')}}"/>
                            @if ($errors->has('title'))
                             <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group"> 
                            <label class="mb-2"> عدد الشواغر <span class="text-danger"> *</span></label>
                            <input class="form-control" type="text" placeholder="عدد الشواغر" name="vacancies_count" value="{{old('vacancies_count')}}"/>
                             @if ($errors->has('vacancies_count'))
                             <span class="text-danger">{{ $errors->first('vacancies_count') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group"> 
                            <label class="mb-2">  مكان التدريب التعاوني  <span class="text-danger"> *</span></label>
                            <select class="select2 form-control" data-placeholder="اختر" name="city_id">
                              @if(!$cities->isEmpty())
                                    <option> </option>
                                  @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                  @endforeach
                             @endif
                            </select>
                             @if ($errors->has('city_id'))
                             <span class="text-danger">{{ $errors->first('city_id') }}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-6"> 
                          <div class="form-group"> 
                            <label class="mb-2">  الموجه (Mentor)  <span class="text-danger"> *</span></label>
                            <select class="select2 form-control" data-placeholder="اختر" name="consultant_id">
                              @if(!$cities->isEmpty())
                                    <option> </option>
                                  @foreach($consultants as $consultant)
                                    <option value="{{ $consultant->id }}" {{ old('consultant_id') == $consultant->id ? 'selected' : '' }}>{{ $consultant->name }}</option>
                                  @endforeach
                             @endif
                            </select>
                             @if ($errors->has('consultant_id'))
                             <span class="text-danger">{{ $errors->first('consultant_id') }}</span>
                            @endif
                          </div>
                        </div>


                        <div class="col-md-6"> 
                          <div class="form-group"> 
                            <label class="mb-2">  عضو هيئة التدريس  <span class="text-danger"> *</span></label>
                            <select class="select2 form-control" data-placeholder="اختر" name="faculty_member_id">
                              @if(!$cities->isEmpty())
                                    <option> </option>
                                  @foreach($faculty_members as $faculty_member)
                                    <option value="{{ $faculty_member->id }}" {{ old('faculty_member_id') == $faculty_member->id ? 'selected' : '' }}>{{ $faculty_member->name }}</option>
                                  @endforeach
                             @endif
                            </select>
                             @if ($errors->has('faculty_member_id'))
                             <span class="text-danger">{{ $errors->first('faculty_member_id') }}</span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-6"> 
                          <div class="form-group"> 
                            <label class="mb-2"> تاريخ بدء التدريب التعاوني  <span class="text-danger"> *</span></label>
                            <input class="form-control datepicker_db" type="text" placeholder="تاريخ بدء التدريب التعاوني" name="start_date" autocomplete="off" value="{{ old('start_date') }}"/>
                             @if ($errors->has('start_date'))
                             <span class="text-danger">{{ $errors->first('start_date') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group"> 
                            <label class="mb-2"> تاريخ نهاية التدريب التعاوني   <span class="text-danger"> *</span></label>
                            <input class="form-control datepicker_db" type="text" placeholder="تاريخ نهاية التدريب التعاوني" name="end_date" autocomplete="off" value="{{ old('end_date') }}"/>
                             @if ($errors->has('end_date'))
                             <span class="text-danger">{{ $errors->first('end_date') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group"> 
                            <label class="mb-2">  نوع التدريب التعاوني  <span class="text-danger"> *</span></label>
                            <select class="select2 form-control" data-placeholder="اختر" name="type_id">
                                @if(!$types->isEmpty())
                                      <option> </option>
                                    @foreach($types as $type)
                                      <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->title }}</option>
                                    @endforeach
                                @endif
                            </select>
                             @if ($errors->has('type_id'))
                             <span class="text-danger">{{ $errors->first('type_id') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group"> 
                            <label class="mb-2">  الفئة المستهدفة   </label>
                            <select class="select2 form-control" data-placeholder="اختر" name="target">
                              <option> </option>
                              <option value="1" {{ old('target') == 1 ? 'selected' : '' }}>ذكور</option>
                              <option value="2" {{ old('target') == 2 ? 'selected' : '' }}>إناث</option>
                              <option value="3" {{ old('target') == 3 ? 'selected' : '' }}>ذكور وإناث</option>
                            </select>
                             @if ($errors->has('target'))
                             <span class="text-danger">{{ $errors->first('target') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group"> 
                            <label class="mb-2">  المؤهل المطلوب<span class="text-danger"> *</span></label>
                            <select class="select2 form-control" data-placeholder="اختر" name="qualification_id">
                                @if(!$qualifications->isEmpty())
                                      <option> </option>
                                    @foreach($qualifications as $qualification)
                                      <option value="{{ $qualification->id }}" {{ old('qualification_id') == $qualification->id ? 'selected' : '' }}>{{ $qualification->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                             @if ($errors->has('qualification_id'))
                             <span class="text-danger">{{ $errors->first('qualification_id') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group"> 
                            <label class="mb-2"> مكافأة التدريب التعاوني </label>
                            <div class="input-icon icon-left">
                              <input class="form-control" type="text" placeholder="00" name="salary" value="{{old('salary')}}"/>
                              <div class="icon w-auto">  ريال سعودي</div>
                            </div>
                             @if ($errors->has('salary'))
                             <span class="text-danger">{{ $errors->first('salary') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group"> 
                            <label class="mb-2"> وصف التدريب التعاوني  <span class="text-danger"> *</span></label>
                            <textarea class="form-control" rows="6" placeholder="أدخل وصف التدريب التعاوني..." name="short_description">{{ old('short_description') }}</textarea>
                             @if ($errors->has('short_description'))
                             <span class="text-danger">{{ $errors->first('short_description') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group"> 
                            <label class="mb-2"> المزايا والمكافأة<span class="text-danger"> *</span></label>
                            <textarea class="form-control" rows="6" placeholder="أدخل المهام والمسؤوليات..." name="features">{{ old('features') }}</textarea>
                             @if ($errors->has('features'))
                             <span class="text-danger">{{ $errors->first('features') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group"> 
                            <label class="mb-2">المهام والمسؤوليات<span class="text-danger"> *</span></label>
                            <textarea class="form-control" rows="6" placeholder="أدخل المهام والمسؤوليات..." name="responsibilities">{{ old('responsibilities') }}</textarea>
                             @if ($errors->has('responsibilities'))
                             <span class="text-danger">{{ $errors->first('responsibilities') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group"> 
                            <label class="mb-2">شروط القبول<span class="text-danger"> *</span></label>
                            <textarea class="form-control" rows="6" placeholder="أدخل شروط القبول..." name="conditions">{{ old('conditions') }}</textarea>
                             @if ($errors->has('conditions'))
                             <span class="text-danger">{{ $errors->first('conditions') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="col-12"> 
                          <div class="text-end">
                            {{-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#successModal">نشر التدريب</button> --}}
                            <button class="btn btn-primary" type="submit">نشر فرصة التدريب التعاوني</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- start:: modal -->
          <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content border-0">
                <div class="modal-body p-0">
                  <form action=""> 
                    <div class="row">
                      <div class="col-lg-8 mx-auto">
                        <div class="text-center p-4 p-lg-5">
                          <div class="icon-checkmark-circle mx-auto mb-3"><img src="../assets/images/checkmark-circle.svg" alt=""/></div>
                          <h3 class="font-semi-bold mb-4">تم نشر التدريب بنجاح!  </h3>
                          <h6 class="text-gray">تم نشر التدريب بنجاح، وستظهر الآن للباحثين عن العمل ضمن الوظائف المتاحة على المنصة.</h6>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="modal-footer d-flex align-items-center justify-content-between"> <a class="btn btn-white" href=""> عرض التدريب</a><a class="px-4 btn btn-primary" href=""> الانتقال للصفحة الرئيسية</a></div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div><!-- end:: modal -->  
</x-common.layout>
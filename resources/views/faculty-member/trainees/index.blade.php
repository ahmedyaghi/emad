<x-common.layout>
  <div class="row mb-4">
    <div class="col-12">
      <div class="row"> 
        <div class="col-12"> 
          <ol class="breadcrumb">
            <div class="breadcrumb-item"><a href="{{route('faculty-member.trainees.index')}}">المتدربين</a></div>
            <div class="breadcrumb-item">قائمة بالمتدربين</div>
          </ol>
        </div>
      </div>
    </div>
  </div>
    <x-common.search  :placeholder="'البحث عن المتدربين ...'" :route="route('faculty-member.trainees.index')"/>
    @if(!$trainees->isEmpty())
    <div class="row mb-4 view-mode">
        @foreach ($trainees as $trainee)
          <x-common.trainee :trainee="$trainee" />
        @endforeach
    </div>
    @endif
    <div class="row"> 
      <div class="col-12"> 
        <div class="pannel p-3">
          {{$trainees->links('components.common.pagination')}}
        </div>
      </div>
    </div>
</x-common.layout>
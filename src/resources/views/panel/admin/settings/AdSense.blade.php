@extends('panel.layout.app')
@section('title', __('AI Code'))

@section('content')


<div class="container">
    <h2>{{__('Adsense Settings')}}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('dashboard.admin.settings.adsenseSave') }}">
        @csrf
        <div class="form-group">
            <label for="adsense_code">{{__('Adsense Code')}}</label>
            <textarea name="adsense_code" class="form-control" rows="5">{{ $AdSense->adsense_code ?? '' }}</textarea>
        </div>

        <div class="form-check">
            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" 
                {{ $AdSense ?  ($AdSense->is_active ? 'checked' : '') : '' }}>
            <label class="form-check-label" for="is_active">{{__('Active')}}</label>
        </div>

        <button type="submit" class="btn btn-primary mt-3">{{__('Save')}}</button>
    </form>
</div>

@endsection

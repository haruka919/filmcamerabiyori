@extends('layouts.app')

@section('title', 'Top')

@section('content')
    <main>
        <div class="p-profileEdit-wrapper">
            <form class="p-form" action="{{ url('posts')}}" method="POST"  accept-charset="UTF-8" enctype="multipart/form-data">
                <input name="utf8" type="hidden" value="✓" />
                {{-- <input type="hidden" name="id" value="{{ $user->id }}" /> --}}
                @csrf
                <div class="p-profileEdit-header">
                    <div class="p-profileEdit-header__inner">
                        <a class="p-profileEdit-header__cancel" href="{{ url()->previous() }}">キャンセル</a>
                        <h1 class="p-profileEdit-header__title">#編集する</h1>
                        <input type="submit" name="commit" value="保存" class="p-profileEdit-header__submit">
                    </div>
                </div>
                <div class="p-wrapper-l">
                    <div class="p-container-m">
                        <label class="p-postEdit-form__pic js-form-pic">
                            <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
                            <input type="file" class="p-postEdit-form__pic-input js-form-picFile" name="photo"  value="{{ old('photo') }}" accept="image/jpeg,image/gif,image/png" />
                            <img class="p-postEdit-form__pic-preview js-form-preview" src={{ asset('image/dammy.jpg') }} alt="">
                            <i class="fas fa-plus p-postEdit-form__icon"></i>
                        </label>
    
                        <input type="text" name="title" class="p-postEdit-form__input @error('title') is-error @enderror"　value="{{ old('title') }}"required placeholder="タイトルを書く">
                        @error('title')
                        <span class="p-postEdit-form__errorMsg" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
    
                        <div class="p-postEdit-form__input-tags">
                            @for ($i = 1; $i <= 10; $i++)
                                <input type="text" name="tags[]" class="p-postEdit-form__input-tag @error('tags[]'.$i) is-error @enderror"　value="{{ old('tags[]'.$i) }}" placeholder="#タグ">
    
                                @error('tags[]'.$i)
                                <span class="p-postEdit-form__errorMsg" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            @endfor
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
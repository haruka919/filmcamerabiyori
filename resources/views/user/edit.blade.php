@extends('layouts.app')

@section('title', 'Top')

@section('content')
    <main>
        <div class="p-profileEdit-wrapper">
            <form class="p-profileEdit" action="/users/update" method="post"  accept-charset="UTF-8" enctype="multipart/form-data">
                <input name="utf8" type="hidden" value="✓" />
                <input type="hidden" name="id" value="{{ $user->id }}" />
                @csrf
                <div class="p-profileEdit-header">
                    <div class="p-profileEdit-header__inner">
                        <a class="p-profileEdit-header__cancel" href="{{ url()->previous() }}">キャンセル</a>
                        <h1 class="p-profileEdit-header__title">#編集する</h1>
                        <input type="submit" name="commit" value="保存" class="p-profileEdit-header__submit">
                    </div>
                </div>
                <div class="p-wrapper-l">
                    <div class=" p-container-m">
                        <div class="p-profileEdit-form">
                            <div class="p-profileEdit-form__pic-wrapper">
                                <label class="p-profileEdit-form__pic js-form-pic">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
                                    <input type="file" class="p-profileEdit-form__pic-input js-form-picFile" name="user_profile_photo"  value="{{ old('user_profile_photo',$user->id) }}" accept="image/jpeg,image/gif,image/png" />
                                    @if ($user->profile_photo)
                                        <img class="js-form-preview" src="{{ asset('storage/user_images/' .$user->profile_photo) }}" alt="avatar" />
                                    @else
                                        <img class="js-form-preview" src={{ asset('image/dammy.jpg') }} alt="">
                                    @endif
                                    <i class="fas fa-plus profile-icon"></i>
                                </label>
                            </div>
            
                            <dl>
                                <dt>
                                    <label for="name">名前</label>
                                </dt>
                                <dd>
                                    <input type="text" name="name" id="name" class="@error('name') is-error @enderror" value="{{ old('name', $user->name) }}" autofocus>
                                    @error('name')
                                        <span class="p-form__errorMsg" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </dd>
                            </dl>
                            
                            <dl>
                                <dt>
                                    <label for="intro">自己紹介</label>
                                </dt>
                                <dd>
                                    <textarea name="intro" id="intro" cols="30" rows="5" class="@error('intro') is-error @enderror" autofocus>{{ old('intro', $user->intro) }}</textarea>
                                    @error('intro')
                                        <span class="p-form__errorMsg" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </dd>
                            </dl>
                            <dl>
                                <dt>
                                    <label for="email">Email</label>
                                </dt>
                                <dd>
                                    <input type="email" name="email" id="email" class="@error('email') is-error @enderror" value="{{ old('email', $user->email) }}" autofocus>
                                    @error('email')
                                        <span class="p-form__errorMsg" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
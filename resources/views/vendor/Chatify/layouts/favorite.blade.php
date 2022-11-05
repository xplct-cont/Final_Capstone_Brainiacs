<div class="favorite-list-item">
    <div data-id="{{ $user->id }}" data-action="0" class="avatar ">
      <img src="{{ asset('images/avatars/' . $user->avatar) }} " width="55px" height="55px"
            alt="Image" style="border-radius: 50%"></div>
            <p>{{ strlen($user->name) > 5 ? substr($user->name,0,6).'..' : $user->name }}</p>
    </div>
   
</div>

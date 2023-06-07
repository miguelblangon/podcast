<div class="card">
    <div class="card-header">
        @include('home.nav')
    </div>
    <div class="card-body">
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            @include('podcast.podcast_usuario_index')
        </div>
       
        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            @include('users.user.from_update')
        </div>
        @if ( Auth::user()->rol=='admin' )
            <div class="tab-pane" id="users" role="tabpanel" aria-labelledby="users-tab" tabindex="0">
                @include('users.admin.admin_panel')
            </div>
            <div class="tab-pane" id="podcast" role="tabpanel" aria-labelledby="podcast-tab" tabindex="0">
                @include('users.admin.admin_panel_podcast')
            </div>
        @endif
    </div>
    </div>
</div>
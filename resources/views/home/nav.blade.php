        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
            </li>
            <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
            </li>
            
            @if ( Auth::user()->rol=='admin' )
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button" role="tab" aria-controls="users" aria-selected="false">users</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link" id="podcast-tab" data-bs-toggle="tab" data-bs-target="#podcast" type="button" role="tab" aria-controls="podcast" aria-selected="false">Podcast</button>
                </li>    
            @endif    
        </ul>
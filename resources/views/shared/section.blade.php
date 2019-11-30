<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{url('/')}}/admin/images/user.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Defrimont Era</div>
                <div class="email">defrimont.era@bekraf.go.id</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">

                        <li role="separator" class="divider"></li>
                        <li><a href="{{url('/')}}/logout"><i class="material-icons">input</i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active">
                    <a href="index">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}/profile">
                        <i class="material-icons">account_circle</i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>

                    <!--    <ul>kamuskompetensi</ul> -->
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">book</i>
                        <span>Kamus Kompetensi</span>
                        <span class="badge bg-orange">8</span>
                    </a>
                    <ul class="ml-menu" id="menu-kompetensi">

                        <li>
                            <a href="{{url('/')}}/kompcorevalue">Kamus Kompetensi Core value</a>
                        </li>
                        <li>
                            <a href="{{url('/')}}/kompmanajerial">Kamus Kompetensi Manajerial</a>
                        </li>
                        <li>
                            <a href="{{url('/')}}/kompsosialcultural">Kamus Kompetensi Sosial Cultural</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Karir</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="#">Pengembangan Kompetensi</a>
                        </li>
                        <li>
                            <a href="{{url('/')}}/rencanapengembangan">Rencana Pengembangan Kompetensi</a>
                        </li>
                        <!--   <li>
                                <a href="rencanakarir">Rencana Karir</a>
                            </li>
                            <li>
                                <a href="#">Pengembangan Karir</a>
                            </li>
                            <li>
                                <a href="konseling">Konseling</a>
                            </li> -->

                    </ul>
                </li>
                <!-- <li>
                    <a href="#">
                        <i class="material-icons">vpn_key</i>
                        <span>Change Password</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="material-icons">help</i>
                        <span>Bantuan</span>
                    </a>
                </li> -->
            </ul>


        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                <a href="javascript:void(0);">E- Katalog </a>| Badan Ekonomi Kreatif
            </div>

        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->

    <!-- #END# Right Sidebar -->
</section>
<script>
    var lmenu =  @foreach(Session::get('menu') as $menu)'{!!$menu??[]!!}';@endforeach
    
    var urlPath = "{{url('/')}}";
    $(document).ready(function () {
        console.log(lmenu);   
        loadSideMenu(); 
    });
    function loadSideMenu()
    {
        let menu = JSON.parse(lmenu);
        let rawhtml = '';
        $(menu).each(function(i,n){
            console.log(i,n);
            rawhtml+="<li>";
            rawhtml+='<a href="'+urlPath+n.link_url+'">'+n.description+'</a>';
            rawhtml+='</li>';
        });
        $("#menu-kompetensi").html(rawhtml);
        // console.log("menu",menu);
    }
    
</script>
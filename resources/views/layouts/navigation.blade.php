<input type="text" class="mySearch mx-auto d-block" id="mySearch" onkeyup="search(this.value)" placeholder="بحث" title="Type in a category">
<ul>

    <li class=" nav-item @if(request()->routeIs('Products.index') || request()->routeIs('Products.archive')) active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_1"
        aria-controls="ddmenu_1" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-newspaper fa-sm"></i>
            </span>
            <span class="text">Products</span>
        </a>
        <ul id="ddmenu_1" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('Products.index') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    Show
                </a>
            </li>
            <li>
                <a href="{{ route('Products.create') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    Add
                </a>
            </li>
        </ul>
    </li>
    
    <li class=" nav-item @if(request()->routeIs('category.index') || request()->routeIs('category.archive')) active @else noneactive @endif nav-item-has-children">
            <a class="search collapsed"  class="" data-bs-toggle="collapse" data-bs-target="#ddmenu_2"
            aria-controls="ddmenu_2" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-list"></i>
            </span>
            <span class="text">Categories</span>
        </a>
        <ul id="ddmenu_2" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('category.index') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    عرض
                </a>
            </li>
            <li>
                <a href="{{ route('category.create') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    اضافة
                </a>
            </li>
        </ul>
    </li>
    
    {{-- <li class=" nav-item @if(request()->routeIs('Articles.index') || request()->routeIs('Articles.archive')) active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed" class="" data-bs-toggle="collapse" data-bs-target="#ddmenu_3"
           aria-controls="ddmenu_3" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-newspaper"></i>
            </span>
            <span class="text">المقالات</span>
        </a>
        <ul id="ddmenu_3" class="dropdown-nav collapse" style="">
            <li>
                <a href="{{route('Articles.index')}}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    عرض
                </a>
                <a href="{{route('Articles.create')}}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    اضافة
                </a>
            </li>
            <li>
            </li>
        </ul>
    </li> --}}
        
    <li class=" nav-item @if(request()->routeIs('Events.index') || request()->routeIs('Events.archive')) active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed" class="" data-bs-toggle="collapse" data-bs-target="#ddmenu_4"
           aria-controls="ddmenu_4" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-briefcase"></i>
            </span>
            <span class="text">Blog</span>
        </a>
        <ul id="ddmenu_4" class="dropdown-nav collapse" style="">
            <li>
                <a href="{{route('Events.index')}}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    Show
                </a>
                <a href="{{route('Events.create')}}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    Add
                </a>
            </li>
            <li>
            </li>
        </ul>
    </li>
    
    <li class=" nav-item @if(request()->routeIs('info.index') || request()->routeIs('info.archive')) active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_5"
        aria-controls="ddmenu_5" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-circle-info"></i>
            </span>
            <span class="text">Contact Info</span>
        </a>
        <ul id="ddmenu_5" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('info.index') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    Show
                </a>
            </li>
            <li>
                <a href="{{ route('info.create') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    Add
                </a>
            </li>
        </ul>
    </li>


    <li class="nav-item @if(request()->routeIs('contactus.index') || request()->routeIs('contactus.archive')) active @endif">
        <a class="search " href="{{route('contactus.index')}}">
              <span class="icon">
                <i class="fa-solid fa-message"></i>
              </span>
            <span class="text">Messages</span>
        </a>
    </li>
    <li class="nav-item @if(request()->routeIs('orders.index') || request()->routeIs('orders.archive')) active @endif">
        <a class="search " href="{{route('orders.index')}}">
              <span class="icon">
                <i class="fa-solid fa-message"></i>
              </span>
            <span class="text">Orders</span>
        </a>
    </li>
    @if (Auth::check() && Auth::user()->role == 'admin')
    <li class=" nav-item @if(request()->routeIs('users.index') || request()->routeIs('register_form')) active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_6"
        aria-controls="ddmenu_6" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon">
                <i class="fa-solid fa-circle-info"></i>
            </span>
            <span class="text">Users</span>
        </a>
        <ul id="ddmenu_6" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('users.index') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    عرض
                </a>
            </li>
            <li>
                <a href="{{ route('register_form') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    اضافة
                </a>
            </li>
        </ul>
    </li>
    @endif

    <li class=" nav-item @if(request()->routeIs('metadata.index') || request()->routeIs('metadata.create')) active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed" class="" data-bs-toggle="collapse" data-bs-target="#ddmenu_7"
           aria-controls="ddmenu_7" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-link"></i>
            </span>
            <span class="text">Meta data</span>
        </a>
        <ul id="ddmenu_7" class="dropdown-nav collapse" style="">
            <li>
                <a href="{{route('metadata.index')}}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    show
                </a>
                <a href="{{route('metadata.create')}}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    add
                </a>
            </li>
        </ul>
    </li>
    <br>            
    <div class="col-12 d-flex justify-content-center align-items-center">
        <h5 class="font-weight-bold" style="color: #0d6efd;">Content</h5>
    </div>
    <br>
    <li class=" nav-item nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_8"
        aria-controls="ddmenu_8" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-circle-info"></i>
            </span>
            <span class="text">Home</span>
        </a>
        <ul id="ddmenu_8" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('homeheader.show' , 'home') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Header
                </a>
            </li>
            <li>
                <a href="{{ route('homeactivity.show' , 'activity') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Activity
                </a>
            </li>
            <li>
                <a href="{{ route('value1.show' , 'value1') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Values
                </a>
            </li>
        </ul>
    </li>
    <li class=" nav-item nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_9"
        aria-controls="ddmenu_9" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon">
            <i class="fa-solid fa-circle-info"></i>
        </span>
        <span class="text">About us</span>
    </a>
    <ul id="ddmenu_9" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('aboutusheader.show','aboutus') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Header
                </a>
            </li>
            <li>
                <a href="{{ route('aboutuscharacteristic1.show','characteristic1') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Characteristics
                </a>
            </li>
            <li>
                <a href="{{ route('ceo.show') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Ceo message
                </a>
            </li>
            <li>
                <a href="{{ route('mission.show') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Mission & Vision
                </a>
            </li>
        </ul>
    </li>
    <li class=" nav-item nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_10"
        aria-controls="ddmenu_10" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon">
            <i class="fa-solid fa-circle-info"></i>
        </span>
        <span class="text">Careers</span>
        </a>
        <ul id="ddmenu_10" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('careersheader.show','careers') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Header
                </a>
            </li>
            <li>
                <a href="{{ route('careersreason1.show','reason1') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Reasons
                </a>
            </li>
            <li>
                <a href="{{ route('careersteam.show') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Our team
                </a>
            </li>
        </ul>
    </li>
    <li class=" nav-item nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_11"
        aria-controls="ddmenu_11" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon">
            <i class="fa-solid fa-circle-info"></i>
        </span>
        <span class="text">Our Companies</span>
        </a>
        <ul id="ddmenu_11" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('ourcompaniesheader.show','ourcompanies') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Header
                </a>
            </li>
            <li>
                <a href="{{ route('activity.show','activity') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Activity
                </a>
            </li>
            <li>
                <a href="{{ route('experience.show','experience') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-page m-0" style="font-size: 14px"></i></div>
                    Experience
                </a>
            </li>
        </ul>
    </li>
</ul>

<script>
    function search (input) 
    {
        input = input.toLowerCase()
        let links = document.querySelectorAll(".search")

        for (let index = 0; index < links.length; index++) {
            if (links[index].textContent.toLowerCase().includes(input)) {
                links[index].style.display = "flex"
            }   else {
                links[index].style.display = "none"
            }
        }
    }
</script>
    
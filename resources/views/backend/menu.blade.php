<div class="navbar navbar-default" id="navbar-second">
    <ul class="nav navbar-nav no-border visible-xs-block">
        <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i
                        class="icon-menu7"></i></a></li>
    </ul>

    <div class="navbar-collapse collapse" id="navbar-second-toggle">
        <ul class="nav navbar-nav">
            <li class="active"><a href="{{route('admin.dashboards.dashboard')}}"><i
                            class="icon-display4 position-left"></i> Dashboard</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-users position-left"></i> Users<span class="caret"></span>
                </a>

                <ul class="dropdown-menu width-250">
                    <li><a href="{{route('admin.users.user')}}">List Users</a></li>
                    <li><a href="{{route('admin.users.create')}}">Create Users</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-file-picture position-left"></i> Slider<span class="caret"></span>
                </a>

                <ul class="dropdown-menu width-250">
                    <li><a href="{{route('admin.sliders.index')}}">List Slider</a></li>
                    <li><a href="{{route('admin.sliders.create')}}">Create Slider</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-blogger position-left"></i> Blog<span class="caret"></span>
                </a>

                <ul class="dropdown-menu width-250">
                    <li><a href="{{route('admin.blogs.index')}}">List Blog</a></li>
                    <li><a href="{{route('admin.blogs.create')}}">Create Blog</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-file-media position-left"></i> Brand Logo<span class="caret"></span>
                </a>

                <ul class="dropdown-menu width-250">
                    <li><a href="{{route('admin.brandLogos.index')}}">List Brand Logo</a></li>
                    <li><a href="{{route('admin.brandLogos.create')}}">Create Brand Logo</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-map position-left"></i>Locations<span class="caret"></span>
                </a>

                <ul class="dropdown-menu width-250">
                    <li><a href="{{route('admin.locations.index')}}">List Location</a></li>
                    <li><a href="{{route('admin.locations.create')}}">Create Location</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route('admin.contacts.index')}}">
                    <i class="icon-envelope position-left"></i> Contact Us
                </a>
            </li>
            <li>
                <a href="{{route('admin.checkouts.index')}}">
                    <i class="icon-cart2 position-left"></i> Checkout Cart
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-list-ordered position-left"></i>Product Category<span class="caret"></span>
                </a>

                <ul class="dropdown-menu width-250">
                    <li><a href="{{route('admin.categories.index')}}">List Product Category</a></li>
                    <li><a href="{{route('admin.categories.create')}}">Create Product Category</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-grid3 position-left"></i>Products<span class="caret"></span>
                </a>

                <ul class="dropdown-menu width-250">
                    <li><a href="{{route('admin.products.index')}}">List Products</a></li>
                    <li><a href="{{route('admin.products.create')}}">Create Products</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="{{route('admin.configs.index')}}">
                    <i class="icon-cog4 position-left"></i> Configs
                </a>
            </li>
        </ul>
    </div>
</div>
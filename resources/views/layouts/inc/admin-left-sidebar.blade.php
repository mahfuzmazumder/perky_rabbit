<!-- Sidebar scroll-->
<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">

            <li class="user-pro"> <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img
                        src="" alt="user-img" class="img-circle"><span class="hide-menu">Mark Jeckson</span></a>
            </li>
            
            <li> <a class="waves-effect waves-dark" href="{{ route('admin_dashboard') }}"><i
                        class="fas fa-tachometer-alt"></i><span class="hide-menu">@lang('common.dashboard')</span></a>
            </li>

            <?php
                $product_menu = ['product_units_manage', 'product_unit_create', 'product_unit_edit', 'product_type_manage', 'product_type_create', 'product_type_edit', 'product_manage', 'product_create', 'product_edit'];
            ?>

            <li class="{{ in_array(Route::currentRouteName(), $product_menu) ? 'active' : '' }}"> 
                <a class="has-arrow waves-effect waves-dark {{ in_array(Route::currentRouteName(), $product_menu) ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false"><i
                        class="fab fa-product-hunt"></i><span class="hide-menu"> @lang('common.product')
                    </span></a>
                <ul aria-expanded="false" class="collapse {{ in_array(Route::currentRouteName(), $product_menu) ? 'active in' : '' }}">

                    @php
                        $product_unit_menu = ['product_units_manage', 'product_unit_create', 'product_unit_edit'];
                    @endphp

                    <li>
                        <a href="{{ route('product_units_manage') }}" class="{{ in_array(Route::currentRouteName(), $product_unit_menu) ? 'active' : '' }}"> @lang('common.product')&nbsp;@lang('common.unit') </a>
                    </li>

                    @php
                        $product_type_menu = ['product_type_manage', 'product_type_create', 'product_type_edit'];
                    @endphp

                    <li>
                        <a href="{{ route('product_type_manage') }}" class="{{ in_array(Route::currentRouteName(), $product_type_menu) ? 'active' : '' }}"> @lang('common.product')&nbsp;@lang('common.type') </a>
                    </li>

                    @php
                        $products_menu = ['product_manage', 'product_create', 'product_edit'];
                    @endphp

                    <li>
                        <a href="{{ route('product_manage') }}" class="{{ in_array(Route::currentRouteName(), $products_menu) ? 'active' : '' }}"> @lang('common.product') </a>
                    </li>

                </ul>
            </li>

            @php
                $inventory_menu = ['product_inventory_create'];
            @endphp

            <li class="{{ in_array(Route::currentRouteName(), $inventory_menu) ? 'active' : '' }}"> 
                <a class="has-arrow waves-effect waves-dark {{ in_array(Route::currentRouteName(), $inventory_menu) ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-warehouse"></i><span class="hide-menu"> @lang('common.inventory')
                    </span></a>
                <ul aria-expanded="false" class="collapse {{ in_array(Route::currentRouteName(), $inventory_menu) ? 'active in' : '' }}">

                    @php
                        $inventory_add = ['product_inventory_create'];
                    @endphp

                    <li>
                        <a href="{{ route('product_inventory_create') }}" class="{{ in_array(Route::currentRouteName(), $inventory_add) ? 'active' : '' }}"> @lang('common.add_inventory') </a>
                    </li>

                    @php
                        $inventory_manage = [];
                    @endphp

                    <li>
                        <a href="{{ route('product_units_manage') }}" class="{{ in_array(Route::currentRouteName(), $inventory_manage) ? 'active' : '' }}"> @lang('common.manage_inventory') </a>
                    </li>

                </ul>
            </li>

        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->

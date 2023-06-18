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
 
             <li class="@yeild('product')"> <a class="has-arrow waves-effect waves-dark @yeild('product')" href="javascript:void(0)" aria-expanded="false"><i
                         class="fab fa-product-hunt"></i><span class="hide-menu"> @lang('common.product')
                     </span></a>
                 <ul aria-expanded="false" class="collapse @yeild('product_in')">
 
                     <li class="">
                         <a href="{{ route('product_units_manage') }}" class="@yeild('product_unit')"> @lang('common.product')&nbsp;@lang('common.unit') </a>
                     </li>
 
                     <li>
                         <a href="javascript:void(0)" class="@yeild('product_type')"> @lang('common.product')&nbsp;@lang('common.type') </a>
                     </li>
 
                 </ul>
             </li>
 
         </ul>
     </nav>
     <!-- End Sidebar navigation -->
 </div>
 <!-- End Sidebar scroll-->
 
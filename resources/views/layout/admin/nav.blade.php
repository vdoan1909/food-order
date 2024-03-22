 <!-- Sidebar menu-->
 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
 <aside class="app-sidebar">
     <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="/images/hay.jpg" width="50px"
             alt="User Image">
         <div>
             <p class="app-sidebar__user-name"><b>Võ Trường</b></p>
             <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
         </div>
     </div>
     <hr>
     <ul class="app-menu">

         <li>
             <a class="app-menu__item active" href="#">
                 <i class='app-menu__icon bx bx-tachometer'></i>
                 <span class="app-menu__label">Bảng điều khiển</span>
             </a>
         </li>
         <li>
             <a class="app-menu__item " href="{{route('admin.category')}}">
                 <i class='app-menu__icon bx bx-list-ul'></i>
                 <span class="app-menu__label">Quản lý danh mục</span>
             </a>
         </li>
     </ul>
 </aside>

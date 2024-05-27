<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <li class="menu-title">
          <span>Main Menu</span>
        </li>
        <li class="submenu">
          <a href="#"><i class="feather-grid"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="{{ URL::to('/') }}" class="">Admin Dashboard</a></li>
            <li><a href="{{ route('teacher.dashboard') }}" class="">Teacher Dashboard</a></li>
            <li><a href="student-dashboard.html">Student Dashboard</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="#"><i class="fas fa-graduation-cap"></i> <span> Students</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="{{ URL::to('/student/student-teacher-classroom') }}">Student List</a></li>
            <li><a href="{{ URL::to('/student/student-view') }}">Student View</a></li>
            <li><a href="add-student.html">Student Add</a></li>
            <li><a href="edit-student.html">Student Edit</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Teachers</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="{{ URL::to('/teacher/teacher-list') }}" class="">Teacher List</a></li>
            <li><a href="teacher-details.html">Class</a></li>
            <li><a href="add-teacher.html">Subjects</a></li>
            <li><a href="edit-teacher.html">Attendances</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="#"><i class="fas fa-book"></i> <span> Library</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="{{ URL::to('/book') }}" class="">Books</a></li>
            <li><a href="{{ URL::to('/book-category') }}" class="">Book Category</a></li>
            <li><a href="{{ URL::to('/book-borrow') }}">Book Borrowing</a></li>
            <li><a href="{{ URL::to('/book-return') }}">Book Returns</a></li>
            <li><a href="edit-teacher.html">Reports</a></li>
          </ul>
        </li>
        <li class="menu-title">
          <span>Pages</span>
        </li>

        {{--
        <li class="submenu">
          <a href="#"><i class="fas fa-building"></i> <span> Departments</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="departments.html">Department List</a></li>
            <li><a href="add-department.html">Department Add</a></li>
            <li><a href="edit-department.html">Department Edit</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="#"><i class="fas fa-book-reader"></i> <span> Subjects</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="subjects.html">Subject List</a></li>
            <li><a href="add-subject.html">Subject Add</a></li>
            <li><a href="edit-subject.html">Subject Edit</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="#"><i class="fas fa-clipboard"></i> <span> Invoices</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="invoices.html">Invoices List</a></li>
            <li><a href="invoice-grid.html">Invoices Grid</a></li>
            <li><a href="add-invoice.html">Add Invoices</a></li>
            <li><a href="edit-invoice.html">Edit Invoices</a></li>
            <li><a href="view-invoice.html">Invoices Details</a></li>
            <li><a href="invoices-settings.html">Invoices Settings</a></li>
          </ul>
        </li>
        <li class="menu-title">
          <span>Management</span>
        </li>
        <li class="submenu">
          <a href="#"><i class="fas fa-file-invoice-dollar"></i> <span> Accounts</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="fees-collections.html">Fees Collection</a></li>
            <li><a href="expenses.html">Expenses</a></li>
            <li><a href="salary.html">Salary</a></li>
            <li><a href="add-fees-collection.html">Add Fees</a></li>
            <li><a href="add-expenses.html">Add Expenses</a></li>
            <li><a href="add-salary.html">Add Salary</a></li>
          </ul>
        </li>
        <li>
          <a href="holiday.html"><i class="fas fa-holly-berry"></i> <span>Holiday</span></a>
        </li>
        <li>
          <a href="fees.html"><i class="fas fa-comment-dollar"></i> <span>Fees</span></a>
        </li>
        <li>
          <a href="exam.html"><i class="fas fa-clipboard-list"></i> <span>Exam list</span></a>
        </li>
        <li>
          <a href="event.html"><i class="fas fa-calendar-day"></i> <span>Events</span></a>
        </li>
        <li>
          <a href="time-table.html"><i class="fas fa-table"></i> <span>Time Table</span></a>
        </li>
        --}}
        
        <li class="submenu">
          <a href="#"><i class="fas fa-book"></i> <span> Library</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="{{ URL::to('/book') }}" class="">Books</a></li>
            <li><a href="{{ URL::to('/book-category') }}" class="">Book Category</a></li>
            <li><a href="{{ URL::to('/book-borrow') }}">Book Borrowing</a></li>
            <li><a href="{{ URL::to('/book-return') }}">Book Returns</a></li>
            <li><a href="edit-teacher.html">Reports</a></li>
          </ul>
        </li>
        {{--
        <li class="submenu">
          <a href="#"
            ><i class="fa fa-newspaper"></i> <span> Blogs</span>
            <span class="menu-arrow"></span>
          </a>
          <ul>
            <li><a href="blog.html">All Blogs</a></li>
            <li><a href="add-blog.html">Add Blog</a></li>
            <li><a href="edit-blog.html">Edit Blog</a></li>
          </ul>
        </li>
        --}}

        <li class="menu-title">
          <span>Pages</span>
        </li>
        <li class="submenu">
          <a href="#"><i class="fas fa-shield-alt"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="login.html">Login</a></li>
            <li><a href="register.html">Register</a></li>
            <li><a href="forgot-password.html">Forgot Password</a></li>
            <li><a href="error-404.html">Error Page</a></li>
          </ul>
        </li>
        <li>
          <a href="blank-page.html"><i class="fas fa-file"></i> <span>Blank Page</span></a>
        </li>
      </ul>
    </div>
  </div>
</div>

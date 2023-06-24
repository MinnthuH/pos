<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboards </span>
                    </a>
                </li>

                @if (Auth::user()->can('pos.menu'))
                    <li>
                        <a href="{{ route('pos') }}">
                            <span class="badge bg-pink float-end">Hot</span>
                            <i class="fas fa-cash-register"></i>
                            <span> POS </span>
                        </a>
                    </li>
                @endif



                <li class="menu-title mt-2">Apps</li>
                @if (Auth::user()->can('employee.menu'))
                    <li>
                        <a href="#employee" data-bs-toggle="collapse">
                            <i class="mdi mdi-account-multiple-outline"></i>
                            <span> Employee Manage</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="employee">
                            <ul class="nav-second-level">
                                @if (Auth::user()->can('employee.all'))
                                    <li>
                                        <a href="{{ route('all#employee') }}">All Employee</a>
                                    </li>
                                @endif

                                @if (Auth::user()->can('employee.add'))
                                    <li>
                                        <a href="{{ route('add#employee') }}">Add Employee</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif

                @if (Auth::user()->can('customer.menu'))
                    <li>
                        <a href="#customer" data-bs-toggle="collapse">
                            <i class="fas fa-users"></i>
                            <span> Customer Manage</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="customer">
                            <ul class="nav-second-level">
                                @if (Auth::user()->can('customer.all'))
                                    <li>
                                        <a href="{{ route('all#customer') }}">All Customer</a>
                                    </li>
                                @endif
                                @if (Auth::user()->can('customer.add'))
                                    <li>
                                        <a href="{{ route('add#customer') }}">Add Customer</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif

                @if (Auth::user()->can('supplier.menu'))
                    <li>
                        <a href="#salary" data-bs-toggle="collapse">
                            <i class="fas fa-truck"></i>
                            <span> Supplier Manage </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="salary">
                            <ul class="nav-second-level">
                                @if (Auth::user()->can('supplier.all'))
                                    <li>
                                        <a href="{{ route('all#supplier') }}">All Supplier</a>
                                    </li>
                                @endif

                                @if (Auth::user()->can('supplier.add'))
                                    <li>
                                        <a href="{{ route('add#supplier') }}">Add Supplier</a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>
                @endif


                @if (Auth::user()->can('salary.menu'))
                    <li>
                        <a href="#employeeSalary" data-bs-toggle="collapse">
                            <i class="fas fa-money-bill-wave"></i>
                            <span> Employee Salary </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="employeeSalary">
                            <ul class="nav-second-level">
                                @if (Auth::user()->can('salary.all'))
                                    <li>
                                        <a href="{{ route('all#advSalary') }}">All Advance Salary</a>
                                    </li>
                                @endif
                                @if (Auth::user()->can('add.advance'))
                                    <li>
                                        <a href="{{ route('add#advSalary') }}">Add Advance Salary</a>
                                    </li>
                                @endif
                                @if (Auth::user()->can('salary.pay'))
                                    <li>
                                        <a href="{{ route('pay#Salary') }}">Pay Salary</a>
                                    </li>
                                @endif
                                @if (Auth::user()->can('salary.paid'))
                                    <li>
                                        <a href="{{ route('month#Salary') }}">Last Month Salary</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif

                @if (Auth::user()->can('attendence.menu'))
                    <li>
                        <a href="#attendance" data-bs-toggle="collapse">
                            <i class="fas fa-clock"></i>
                            <span> Employee Attendance </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="attendance">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('add#attendance') }}">Add Employee Attendance</a>
                                </li>
                                <li>
                                    <a href="{{ route('employee#attendance') }}">Employee Attendance List</a>
                                </li>


                            </ul>
                        </div>
                    </li>
                @endif
                @if (Auth::user()->can('category.menu'))
                    <li>
                        <a href="#category" data-bs-toggle="collapse">
                            <i class="fas fa-box"></i>
                            <span> Category </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="category">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('all#category') }}">All Category</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif
                @if (Auth::user()->can('product.menu'))
                    <li>
                        <a href="#products" data-bs-toggle="collapse">
                            <i class="fas fa-boxes"></i>
                            <span> Products </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="products">
                            <ul class="nav-second-level">
                                @if (Auth::user()->can('product.all'))
                                    <li>
                                        <a href="{{ route('all#product') }}">All Product</a>
                                    </li>
                                @endif
                                @if (Auth::user()->can('prodcut.add'))
                                    <li>
                                        <a href="{{ route('add#product') }}">Add Product</a>
                                    </li>
                                @endif
                                @if (Auth::user()->can('product.import'))
                                    <li>
                                        <a href="{{ route('import#product') }}">Import Product</a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>
                @endif
                @if (Auth::user()->can('order.menu'))
                    <li>
                        <a href="#orders" data-bs-toggle="collapse">
                            <i class="fas fa-clipboard"></i>
                            <span> orders </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="orders">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('pending#order') }}">Pending Orders</a>
                                </li>
                                <li>
                                    <a href="{{ route('complete#order') }}">Complete Order</a>
                                </li>

                                <li>
                                    <a href="{{ route('pending#due') }}">Pending Due</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                <li>
                    <a href="#sales" data-bs-toggle="collapse">
                        <i class=" fas fa-hand-holding-usd"></i>
                        <span> Sales </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sales">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all#sale') }}">All Sales</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#stock" data-bs-toggle="collapse">
                        <i class="fas fa-chart-line"></i>
                        <span> Stock Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="stock">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('manage#stock') }}">Stock</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @if (Auth::user()->can('role&permission.menu'))
                <li>
                    <a href="#permission" data-bs-toggle="collapse">
                        <i class="fas fa-user-shield"></i>
                        <span> Role & Permission </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="permission">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all#permission') }}">All Permission</a>
                            </li>
                            <li>
                                <a href="{{ route('all#roles') }}">All Roles</a>
                            </li>
                            <li>
                                <a href="{{ route('add#rolepermission') }}">Roles In Permission</a>
                            </li>
                            <li>
                                <a href="{{ route('all#rolepermission') }}">All Roles In Permission</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                @if (Auth::user()->can('role&permission.menu'))
                <li>
                    <a href="#admin" data-bs-toggle="collapse">
                        <i class="fas fa-user-cog"></i>
                        <span> Setting Admin User </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="admin">
                        <ul class="nav-second-level">
                            @if (Auth::user()->can('admin.all'))
                            <li>
                                <a href="{{ route('all#admin') }}">All Admin</a>
                            </li>
                            @endif
                            @if (Auth::user()->can('admin.add'))
                            <li>
                                <a href="{{ route('all#roles') }}">Add Role</a>
                            </li>
                            @endif

                        </ul>
                    </div>
                </li>
                @endif



                <li class="menu-title mt-2">Custom</li>

                <li>
                    <a href="#addexpense" data-bs-toggle="collapse">
                        <i class="fas fa-coins"></i>
                        <span> Expense </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="addexpense">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('add#expense') }}">Add Expense</a>
                            </li>
                            <li>
                                <a href="{{ route('today#expense') }}">Today Expense</a>
                            </li>
                            <li>
                                <a href="{{ route('month#expense') }}">Monthly Expense</a>
                            </li>
                            <li>
                                <a href="{{ route('year#expense') }}">Yearly Expense</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#backup" data-bs-toggle="collapse">
                        <i class="fas fa-cloud-download-alt"></i>
                        <span>Database Backup </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="backup">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('backup#database') }}">Database Backup</a>
                            </li>

                        </ul>
                    </div>
                </li>


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>

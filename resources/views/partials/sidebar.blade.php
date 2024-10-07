
<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Menu Principal</li>
            <li><a class="has-arrow" href="{{route('home')}}" aria-expanded="false">
                    <i class="la la-home"></i>
                    <span class="nav-text">Tableau de bord</span>
                </a>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-user"></i>
                    <span class="nav-text">Courriers</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('courriers.index')}}">Type de courriers</a></li>
                    <li><a href="{{route('dispositions.index')}}">Les Annotations</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-users"></i>
                    <span class="nav-text">Courriers Entrants</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('reception_courriers.index')}}">Tous les courriers entrants</a></li>
                    <li><a href="{{route('reception_courriers.create')}}">Ajouter un courrier entrant</a></li>
                    {{-- <li><a href="{{route('reception_courriers.edit')}}">Editer un courrier entrant</a></li>
                    <li><a href="{{route('reception_courriers.show')}}">Voir un courrier entrant</a></li> --}}
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-graduation-cap"></i>
                    <span class="nav-text">Courriers Sortants</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('bordereau_envois.index')}}">les bordereaux d'envois</a></li>
                    <li><a href="{{route('bordereau_envois.create')}}">Ajouter un bordereau </a></li>
                    {{-- <li><a href="{{route('bordereau_envois.edit')}}">Editer un bordereau d'envois</a></li>
                    <li><a href="{{route('bordereau_envois.show')}}">Voir un bordereau d'envois</a></li> --}}
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-book"></i>
                    <span class="nav-text">Courriers Internes</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('courrier-internes.create') }} ">Ajouter courrier interne</a></li>
                    <li><a href="{{ route('courrier-internes.index') }}"> les courriers internes</a></li>
                    
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-building"></i>
                    <span class="nav-text">Imputations</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('imputations.index') }}">les imputations</a></li>
                </ul>
            </li>
            				
            <li class="nav-label">Paramètres</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-users"></i>
                    <span class="nav-text">Services/Divisions</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('services.index') }}">Les divisions</a></li>
                    {{-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                        <ul aria-expanded="false">
                            <li><a href="email-compose.html">Compose</a></li>
                            <li><a href="email-inbox.html">Inbox</a></li>
                            <li><a href="email-read.html">Read</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li><a href="app-calender.html">Calendar</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Shop</a>
                        <ul aria-expanded="false">
                            <li><a href="ecom-product-grid.html">Product Grid</a></li>
                            <li><a href="ecom-product-list.html">Product List</a></li>
                            <li><a href="ecom-product-detail.html">Product Details</a></li>
                            <li><a href="ecom-product-order.html">Order</a></li>
                            <li><a href="ecom-checkout.html">Checkout</a></li>
                            <li><a href="ecom-invoice.html">Invoice</a></li>
                            <li><a href="ecom-customers.html">Customers</a></li>
                        </ul>
                    </li> --}}
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="la la-signal"></i>
                    <span class="nav-text">Personnel/Signataire</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('personnels.index') }}">Personnel</a></li>
                    <li><a href="{{ route('signataires.index') }}">Liste des Signataires</a></li>
                </ul>
            </li>
            <li class="nav-label">Gestion des Utilisateurs</li>
            <li class="mega-menu mega-menu-xl"><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="la la-globe"></i>
                    <span class="nav-text">Comptes</span>
                </a>
                <ul aria-expanded="false">
                   {{--  <li><a href="ui-accordion.html">Accordion</a></li>
                    <li><a href="ui-alert.html">Alert</a></li>
                    <li><a href="ui-badge.html">Badge</a></li>
                    <li><a href="ui-button.html">Button</a></li>
                    <li><a href="ui-modal.html">Modal</a></li>
                    <li><a href="ui-button-group.html">Button Group</a></li>
                    <li><a href="ui-list-group.html">List Group</a></li>
                    <li><a href="ui-media-object.html">Media Object</a></li>
                    <li><a href="ui-card.html">Cards</a></li>
                    <li><a href="ui-carousel.html">Carousel</a></li>
                    <li><a href="ui-dropdown.html">Dropdown</a></li>
                    <li><a href="ui-popover.html">Popover</a></li>
                    <li><a href="ui-progressbar.html">Progressbar</a></li>
                    <li><a href="ui-tab.html">Tab</a></li>
                    <li><a href="ui-typography.html">Typography</a></li>
                    <li><a href="ui-pagination.html">Pagination</a></li>
                    <li><a href="ui-grid.html">Grid</a></li> --}}
                </ul>
            </li>
            {{-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-plus-square-o"></i>
                    <span class="nav-text">Plugins</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="uc-select2.html">Select 2</a></li>
                    <li><a href="uc-nestable.html">Nestedable</a></li>
                    <li><a href="uc-noui-slider.html">Noui Slider</a></li>
                    <li><a href="uc-sweetalert.html">Sweet Alert</a></li>
                    <li><a href="uc-toastr.html">Toastr</a></li>
                    <li><a href="map-jqvmap.html">Jqv Map</a></li>
                </ul>
            </li>
            <li><a href="widget-basic.html" aria-expanded="false">
                    <i class="la la-desktop"></i>
                    <span class="nav-text">Widget</span>
                </a></li>
            <li class="nav-label">Forms</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-file-text"></i>
                    <span class="nav-text">Forms</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="form-element.html">Form Elements</a></li>
                    <li><a href="form-wizard.html">Wizard</a></li>
                    <li><a href="form-editor-summernote.html">Summernote</a></li>
                    <li><a href="form-pickers.html">Pickers</a></li>
                    <li><a href="form-validation-jquery.html">Jquery Validate</a></li>
                </ul>
            </li>
            <li class="nav-label">Table</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-table"></i>
                    <span class="nav-text">Table</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
                    <li><a href="table-datatable-basic.html">Datatable</a></li>
                </ul>
            </li>
            <li class="nav-label">Extra</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-th-list"></i>
                    <span class="nav-text">Pages</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="page-register.html">Register</a></li>
                    <li><a href="page-login.html">Login</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                        <ul aria-expanded="false">
                            <li><a href="page-error-400.html">Error 400</a></li>
                            <li><a href="page-error-403.html">Error 403</a></li>
                            <li><a href="page-error-404.html">Error 404</a></li>
                            <li><a href="page-error-500.html">Error 500</a></li>
                            <li><a href="page-error-503.html">Error 503</a></li>
                        </ul>
                    </li>
                    <li><a href="page-lock-screen.html">Lock Screen</a></li>
                </ul>
            </li> --}}
        </ul>
    </div>
</div>
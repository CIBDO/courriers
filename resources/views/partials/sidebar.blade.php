 <div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Menu</li>
            <li><a href="{{ route('home') }}" aria-expanded="false">
                    <i class="la la-home"></i>
                    <span class="nav-text">Tableau de Bord</span>
                </a>
            </li>
            <li><a href="javascript:void()" aria-expanded="false">
                    <i class="la la-calendar"></i>
                    <span class="nav-text">Services</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('services.index') }}">Voir Services</a></li>
                </ul>
            </li>
            <li><a href="javascript:void()" aria-expanded="false">
                    <i class="la la-user"></i>
                    <span class="nav-text">Personnel</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('personnels.index') }}">Liste des Agents</a></li>
                    <li><a href="{{ route('signataires.index') }}">Liste des Signataires</a></li>
                </ul>
            </li>
            <li><a href="javascript:void()" aria-expanded="false">
                    <i class="la la-envelope"></i>
                    <span class="nav-text">Courriers</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('courriers.index') }}">Type Courriers</a></li>
                    <li><a href="{{ route('dispositions.index') }}">Les Dispositions</a></li>
                </ul>
            </li>
            <li><a href="javascript:void()" aria-expanded="false">
                    <i class="la la-users"></i>
                    <span class="nav-text">Interlocuteurs</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('expeditaires.index') }}">Voir Expediteurs</a></li>
                    <li><a href="{{ route('destinataires.index') }}">Voir Destinataires</a></li>
                </ul>
            </li>
            <li><a href="javascript:void()" aria-expanded="false">
                    <i class="la la-tasks"></i>
                    <span class="nav-text">Traitement de Courriers</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('reception_courriers.create') }}">Courriers Entrants</a></li>
                    <li><a href="{{ route('reception_courriers.index') }}">Voir Entrants</a></li>
                    <li><a href="{{ route('bordereau_envois.create') }}">Courriers sortants</a></li>
                    <li><a href="{{ route('bordereau_envois.index') }}">Voir Sortants</a></li>
                    <li><a href="{{ route('courrier-internes.create') }}">Courriers Internes</a></li>
                    <li><a href="{{ route('courrier-internes.index') }}">Voir Internes</a></li>
                </ul>
            </li>
            <li><a href="javascript:void()" aria-expanded="false">
                    <i class="la la-book"></i>
                    <span class="nav-text">Imputations</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('imputations.index') }}">Imputer le Courrier</a></li>
                </ul>
            </li>
            <li><a href="javascript:void()" aria-expanded="false">
                    <i class="la la-building"></i>
                    <span class="nav-text">Les Comptes</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('users.create') }}">Créer un Compte</a></li>
                    <li><a href="{{ route('users.index') }}">Liste des Utilisateurs</a></li>
                </ul>
            </li>
            <li><a href="javascript:void()" aria-expanded="false">
                    <i class="la la-building"></i>
                    <span class="nav-text">Les Rôles</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('roles.create') }}">Créer un Rôle</a></li>
                    <li><a href="{{ route('roles.index') }}">Liste des Rôles</a></li>
                </ul>
            </li>
            <li><a href="javascript:void()" aria-expanded="false">
                    <i class="la la-building"></i>
                    <span class="nav-text">Les Permissions</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('permissions.create') }}">Gérer les Autorisations</a></li>
                    <li><a href="{{ route('permissions.index') }}">Les Autorisations </a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

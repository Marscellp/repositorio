<div class="content-wrapper">
    {{-- TITLE --}}
    @include('template.components.title')
    {{-- ***** --}}

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body">
                @yield('content')
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
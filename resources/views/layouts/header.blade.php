<header>

    <div class="logo left">
        <i id="menu" class="material-icons">menu</i>
        <a href="{{ url('/') }}">
            <img src="https://www.freecodecamp.org/news/content/images/2022/01/yt-logo.png" />
        </a>
    </div>
    <div class="search center">
        <form action="">
            <input type="text" placeholder="Search" />
            <button><i class="material-icons" style="line-height: 2">search</i></button>
        </form>
        <i class="material-icons mic">mic</i>
    </div>


    <div class="icons right">
        <a href="{{ route('video.create', ['channel' => Auth::user()->channel]) }}" style="text-decoration: none">
            <i class="material-icons">videocam</i>
        </a>
        
        {{-- <i class="material-icons">apps</i> --}}
        <i class="material-icons">notifications</i>
        <i class="material-icons display-this" id="toggleBtn">
            <img src="{{ asset('assets/images/dummy.jpg') }}" alt="">
        </i>
    </div>

    <div class="sub-menu-wrap" id="showMenu">
        <div class="sub-menu">
            <div class="user-info">
                <img src="{{ asset('assets/images/dummy.jpg') }}" alt="">
                <h3>John Code</h3>
            </div>
            <hr>
            <div class="op">
                <a href="{{ route('channel.edit', Auth::user()->channel) }}" class="sub-menu-link">
                    <img
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAABBUlEQVQ4jcXSO0pDQRgF4A+JUTGpRdC7iHSSuADdh48diG5A6yDEDagptZFgOtehsbhmA9qYKhbzX7gJN7ESDwzD/zpzZs7wB9hHH2NM8IF7tH8brKGHNxxhB6uxH2OE6+irRA9PaCyoNzAIkkrZr6XhDM/4ij2LfBPvVdfph+wCQ5xhE+dBUuAEd/MEY+muBT5LapoRF8ikh53BBPVSPIiTG7iIuEAd38sUbOAG09LqYb2kIC8GV2J/wWE0DbGFlvQGLWxHfg0H0T+DjuT/FR5KxOWDHnEZfXvzBCR/p5KlVehEvbugrhYkI8mqXeknZjiNfNeSn1igLfmcS+7kuF0k+//xA4xOOElCynOxAAAAAElFTkSuQmCC">
                    <span></span>
                    <p>Your channel</p>
                    <span></span>
                </a>

                <a href="{{ route('video.create', ['channel' => Auth::user()->channel]) }}" class="sub-menu-link">
                    <img
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAB6klEQVRIieXVT4hPURQH8M9vxjRmGAxjMWMxxUo/JSTZKLMiG8kgYUNKVkosJCX1o1nYqJEskI0UQrGTLCSF0iQTCzKMFA1CEhbnvvr1/J55NSv51uvd8873/Ln3nHse/zoqJXnN2IlpSR7DyYkGb65bz8cP9GM/fk3UeR8+YEOS19c5XZLWnUneinvoLut8JT7jGF5jCB9xNunbMYBhXMZVHMKTMkGaU+ZHk1zFXnQ04LZiXXpLgW6X2cFmjIhzL4sd+Io1ZQ0eYXedvA+30FvAP4Fz4zltw1ysxrskZ6jhAd5iSwPbXtG6czCjKMAgvuA9jud0NRwUNXmIi5iV41zAc3wSRwaa6gitOICZ2FOQxBCW42UKtLBOtxHzcAXTs4+Tcg7aRH+P4WdBkCbRqt/Tk6EzPR15coZhbBf9PFjgfKmoxRQsStwMd9OuVmC0wB5RqDcpyww1PBYXb20Dm2WiMSbnFU1/co3gFbblvj3DYnHGeezCNXz7W+YZBvAUPWXICQvE7vrHI1ZEpxxOch+OoKsBtypqVUULborZNC66RfFOiVoMigt2JunbcT9lfDq9b+COxjOrMMh1UTyi8CNp3SMuY0uSN+ESpjZyVPaP1oUXOJ92sAqzyxiWDVARMyibT6NiPP8H+A3qpWHBFyXhGAAAAABJRU5ErkJggg==">
                    <p>Youtube studio</p>
                    <span></span>
                </a>

                <a href="" class="sub-menu-link">
                    <img
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAAtklEQVQ4je3QMU5CURCF4Y+GRtwABcbGWNuwBCIbIroOK5Zh6SNqR80GbDUvFDx9DRUWDsl1nha0hJNMZnJy5z+Ty9HpAgu0qDA6FLDArqin8Ecxf0X/F9wmQBt+hRnOcFeAO3pNgOcCPIj5vAB3dI0mlhtchf8SyQPcF+BfukWdLvjABJdYh1f7+WzQi36DJfp/gLd4wztWGMfeFJv9o8eUnGtZAHt4wLxMyafn+kxXDWPnJHwDfa0/KgfkQM0AAAAASUVORK5CYII=">
                    <p>Switch account</p>
                    <span>&#8250;</span>
                </a>

                <a href="{{ route('logout') }}" class="sub-menu-link"
                    onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                    >
                    <img
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAA8klEQVRIie3VvUoDQRSG4cdoIyGgpfeglWgVESyFVIqSK/A2vBfBQrCRYCkKFv6ks7YNxMrOwiZFJrgsu+5MdtPlhSl2mf3eYc+ZGZZUsFLwbgNn2AzP9/iYV7BaED5EC79YD+Ff8wryXOCqqTCmK82yhc/Ib7exlypIoY0BDhcleMUJbnC0CAE8B8l1maSuYCY5LZOsRYbs4LhizjvuguQtVcDfxiujExNyGUYqXYwV/KImatDFLfp4aFrwbzhpNcizH8LP8Vg2qY7gBz2ZjokRjHAQKYg6wvP3wey4fskE1LoP8kX+xi6eTPu+qveX1GcCZT4kuKHtSusAAAAASUVORK5CYII=">
                    <p>Sign out</p>
                    <span></span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>

    </div>
</header>

@section('scripts')
    <script src="{{ asset('assets/js/app.js') }}"></script>
@endsection

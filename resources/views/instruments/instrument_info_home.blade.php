<!DOCTYPE html>
<html>
<head>
    <title>~ Strings n' Things ~</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/instruments.css') }}" rel="stylesheet">
    {{--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">--}}

    <!-- Three.js Library -->

    <script type="importmap">
  {
    "imports": {
      "three": "https://unpkg.com/three@0.128.0/build/three.module.js",
      "three/addons/": "https://unpkg.com/three@0.128.0/examples/jsm/"
    }
  }
</script>

    <!-- OrbitControls.js -->
    <script src="https://threejs.org/examples/js/controls/OrbitControls.js"></script>

    <!-- GLTFLoader.js -->
    <script src="https://threejs.org/examples/js/loaders/GLTFLoader.js"></script>

</head>
<body class="bg-light col-lg-12 h-100">

<div class="container d-block">
    <nav class="navbar navbar-expand-lg navbar-collapse bg-dark navbar-dark rounded-bottom font-weight-bold mb-3">
        <div class="container">
            <div class="collapse navbar-collapse center-block" id="navbarResponsive">
                <ul class="navbar-nav justify-content-center">
                    <li class="nav-item mr-5"><a class="nav-link" href="/home">Home</a></li>
                    <li class="nav-item active mr-5"><a class="nav-link text-light" href="/catalogue">Catalogue</a></li>
                    <li class="nav-item"><a class="nav-link" href="/shopping_cart">Shopping cart</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container col-lg-12 p-5">
        <div class="title pt-3 col-lg-12 mx-auto text-center">
            <h3 class="mt-3">{{$instrument['name']}}</h3>
        </div>
    </div>

    <div class="container col-lg-12 text-center pt-4">
        <div class="btn text-monospace text-center text-dark">
            <a class="btn-text" style="text-decoration: none" href="{{action('App\Http\Controllers\InstrumentController@home')}}"><span>Go back</span></a>
        </div>
    </div>

    <hr class="style15">

    @if (session('success'))
        <div class="alert alert-success" style="margin: 15px;">
            <strong> {{ session('success') }} </strong>
        </div>
    @elseif(session('warning'))
        <div class="alert alert-warning" style="margin: 15px;">
            <strong> {{ session('warning') }} </strong>
        </div>
    @endif


    <div class="container col-lg-12 d-inline">
        <div id="instrument" class="float-left border" style="width: 600px; height: 400px;">
        </div>

        <div class="float-left col-lg-4 d-inline-block">
            <div class="typewriter p-3">
                <h5>Description</h5>
            </div>
            <span class="text-monospace text-dark">{{$instrument['details']}}</span>
            <h5 class="text-monospace pt-5 text-dark">Instrument family: <span class="text-muted">{{$family_name['family']}}</span></h5>
            <h5 class="text-monospace pt-1 text-dark">Price: <span class="text-muted">${{$instrument['price']}}</span></h5>
            <h5 class="text-monospace pt-1 text-dark">In stock: <span class="text-muted">{{$instrument['in_store']}}</span></h5>
            <div class="btn text-monospace text-center text-dark">
                <form action="/shopping_cart" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $instrument['id']}}">
                    <input type="hidden" name="name" value="{{ $instrument['name'] }}">
                    <input type="hidden" name="price" value="{{ $instrument['price'] }}">
                    <input type="hidden" name="family" value="{{ $instrument['instrument_family'] }}">
                    <div class="container col-lg-12 text-center p-4">
                        <input type="submit" class="btn-text bg-transparent" value="Add to cart">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="module">
        'use strict';
        import * as THREE from 'three';
        import { OrbitControls } from 'three/addons/controls/OrbitControls.js';
        import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';

        function setupRendererAndCanvas(id) {
            const canvas = document.createElement('canvas');
            const renderer = new THREE.WebGLRenderer({ canvas: canvas });
            renderer.shadowMap.enabled = true;
            const div = document.getElementById(id);
            div.appendChild(canvas);
            canvas.style.width = '100%';
            canvas.style.height = '100%';
            return renderer;
        }

        function setupCamera() {
            const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
            camera.position.set(0, 10, 20);
            return camera;
        }

        function setupControls(camera, canvas) {
            const controls = new OrbitControls(camera, canvas);
            controls.minDistance = 0.4;
            controls.maxDistance = 10;
            controls.maxPolarAngle = Math.PI / 2;
            controls.minPolarAngle = 0;
            controls.autoRotate = true;
            controls.autoRotateSpeed = 2.0;
            controls.target.set(0, 5, 0);
            controls.update();
            return controls;
        }

        function setupScene() {
            const scene = new THREE.Scene();
            scene.background = new THREE.Color(0xd1d1d1);

            addLights(scene);
            addPlane(scene);

            return scene;
        }

        function addLights(scene) {
            const hemisphereLight = new THREE.HemisphereLight(0xB1E1FF, 0xB97A20, 1);
            scene.add(hemisphereLight);

            const directionalLight = new THREE.DirectionalLight(0xFFFFFF, 1);
            directionalLight.position.set(5, 10, 2);
            directionalLight.castShadow = true;
            scene.add(directionalLight);
            scene.add(directionalLight.target);

            const spotlight = new THREE.SpotLight(0xfaf7c0);
            spotlight.position.set(0, 10, 10);
            spotlight.angle = Math.PI / 4;
            spotlight.penumbra = 0.1;
            spotlight.decay = 2;
            spotlight.distance = 50;
            spotlight.castShadow = true;
            scene.add(spotlight);
        }

        function addPlane(scene) {
            const planeGeometry = new THREE.PlaneGeometry(100, 100);
            const planeMaterial = new THREE.MeshStandardMaterial({ color: 0x5c5c5c });
            const plane = new THREE.Mesh(planeGeometry, planeMaterial);
            plane.rotation.x = -Math.PI / 2;
            plane.position.y = -1;
            plane.receiveShadow = true;
            scene.add(plane);
        }

        function loadModel(scene, camera, controls) {
            const gltfLoader = new GLTFLoader();
            const modelPath = "{{ asset($instrument['object']) }}";
            gltfLoader.load(modelPath, (gltf) => {
                const model = gltf.scene;
                model.traverse((node) => { if (node.isMesh) node.castShadow = true; });
                scene.add(model);

                const box = new THREE.Box3().setFromObject(model);
                const boxSize = box.getSize(new THREE.Vector3()).length();
                const boxCenter = box.getCenter(new THREE.Vector3());

                frameArea(boxSize * 0.5, boxSize, boxCenter, camera);
                controls.maxDistance = boxSize * 10;
                controls.target.copy(boxCenter);
                controls.update();
            }, undefined, (error) => console.error('Error loading GLB file:', error));
        }

        function frameArea(sizeToFitOnScreen, boxSize, boxCenter, camera) {
            const halfSizeToFitOnScreen = sizeToFitOnScreen * 0.8;
            const halfFovY = THREE.Math.degToRad(camera.fov * .5);
            const distance = halfSizeToFitOnScreen / Math.tan(halfFovY);

            const direction = (new THREE.Vector3()).subVectors(camera.position, boxCenter).multiply(new THREE.Vector3(1, 0, 1)).normalize();
            camera.position.copy(direction.multiplyScalar(distance).add(boxCenter));

            camera.near = boxSize / 100;
            camera.far = boxSize * 100;
            camera.updateProjectionMatrix();
            camera.lookAt(boxCenter.x, boxCenter.y, boxCenter.z);
        }

        function resizeRendererToDisplaySize(renderer) {
            const canvas = renderer.domElement;
            const width = canvas.clientWidth;
            const height = canvas.clientHeight;
            const needResize = canvas.width !== width || canvas.height !== height;
            if (needResize) {
                renderer.setSize(width, height, false);
            }
            return needResize;
        }

        function render(renderer, scene, camera) {
            function animate() {
                if (resizeRendererToDisplaySize(renderer)) {
                    camera.aspect = renderer.domElement.clientWidth / renderer.domElement.clientHeight;
                    camera.updateProjectionMatrix();
                }

                renderer.render(scene, camera);
                requestAnimationFrame(animate);
            }

            requestAnimationFrame(animate);
        }

        function main(id) {
            const renderer = setupRendererAndCanvas(id);
            const camera = setupCamera();
            const controls = setupControls(camera, renderer.domElement);
            const scene = setupScene();

            loadModel(scene, camera, controls);
            render(renderer, scene, camera);
        }

        main('instrument');
    </script>

</div>



</body>
</html>

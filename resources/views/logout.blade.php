<div
    style="
    display: flex; /* Habilita flexbox */
    justify-content: center; /* Centra horizontalmente */
    align-items: center; /* Centra verticalmente */
    height: 100vh; /* Ocupa toda la altura de la ventana */
    background-color: #f8f9fa; /* Color de fondo opcional */
">
    <form action="{{ route('logout.session') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit"
            style=" 
            background-color: #37942e; /* Color de fondo */
            color: white; /* Color del texto */
            border: none; /* Sin borde */
            border-radius: 5px; /* Bordes redondeados */
            padding: 10px 15px; /* Espaciado interno */
            cursor: pointer; /* Cursor de mano */
            font-size: 16px; /* Tamaño de la fuente */
            transition: background-color 0.3s ease; /* Transición suave */
        ">
            Cerrar sesión
        </button>
    </form>
</div>

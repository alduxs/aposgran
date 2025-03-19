<div class="col-lg-10 col-xl-8 mb-5">
    <div class="row g-3">

        <div class="col-12">
            <h3>Datos de la empresa</h3>
        </div>

        <div class="col-12">
            <label for="enombre" class="form-label">Nombre o Razón Social</label>
            <input type="text" class="form-control" id="enombre" name="enombre" required="">
            <div class="invalid-feedback">
                Nombre o Razón Social obligatorio.
            </div>
        </div>

        <div class="col-md-6">
            <label for="efecha" class="form-label">Fecha de constitución</label>
            <input type="text" class="form-control" name="efecha" id="efecha" required="">
            <div class="invalid-feedback">
                Fecha de constitución obligatoria.
            </div>
        </div>
        <div class="col-md-6">
            <label for="eactividad" class="form-label">Actividad</label>
            <input type="text" class="form-control" id="eactividad" name="eactividad" required="">
            <div class="invalid-feedback">
                Actividad obligatoria.
            </div>
        </div>

        <div class="col-12">
            <label for="edireccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="edireccion" name="edireccion" required="">
            <div class="invalid-feedback">
                Dirección obligatoria.
            </div>
        </div>


        <div class="col-md-4">
            <label for="elocalidad" class="form-label">Localidad</label>
            <input type="text" class="form-control" id="elocalidad" name="elocalidad" required="">
            <div class="invalid-feedback">
                Localidad obligatoria.
            </div>
        </div>

        <div class="col-md-4">
            <label for="eprovincia" class="form-label">Provincia</label>
            <input type="text" class="form-control" id="eprovincia" name="eprovincia" required="">
            <div class="invalid-feedback">
                Provincia obligatoria.
            </div>
        </div>

        <div class="col-md-4">
            <label for="ecp" class="form-label">CP</label>
            <input type="text" class="form-control" id="ecp" name="ecp">
        </div>


        <div class="col-md-6">
            <label for="etfijo" class="form-label">Teléfono fijo</label>
            <input type="text" class="form-control" id="etfijo" name="etfijo">
        </div>



        <div class="col-md-6">
            <label for="eemail" class="form-label">Email</label>
            <input type="email" class="form-control" id="eemail" name="eemail" required="">
            <div class="invalid-feedback">
                Email obligatorio.
            </div>
        </div>


        <div class="col-12">
            <div class="titulo-label">Categoría IVA</div>


            <div class="form-check">
                <input class="form-check-input" type="radio" name="iva" id="iva1" value="Responsable Inscripto" required>
                <label class="form-check-label" for="iva1">Resp. Inc.</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="iva" id="iva2" value="Monottributo" required>
                <label class="form-check-label" for="iva2">Monotributo</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="iva" id="iva3" value="Exento" required> 
                <label class="form-check-label" for="iva3">Exento</label>
                <div class="invalid-feedback">Categoría IVA Obligatoria</div>
            </div>
            

        </div>

        <div class="col-md-12">
            <label for="ecuit" class="form-label">CUIT</label>
            <input type="text" class="form-control" id="ecuit" name="ecuit" required="">
            <div class="invalid-feedback">
                CUIT obligatorio.
            </div>
        </div>


    </div>

</div>
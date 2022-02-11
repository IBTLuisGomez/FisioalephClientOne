<template>
  <div class="container">
    <div class="row">
      <div>
        <h2>ANÁLISIS DE PUESTO</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <input type=text class="form-control" placeholder="Empresa" v-model="jobValoration.valoration_job_analysis_empresa[0].json_values" outlined/>
      </div>
      <div class="col-lg-6">
        <input type=text class="form-control" placeholder="Puesto de trabajo" outlined/>
      </div>
      <div class="col-lg-6">
        <input type=text class="form-control" placeholder="Paciente" outlined/>
      </div>
      <div class="col-lg-6">
        <input type=text class="form-control" placeholder="Departamento" outlined/>
      </div>
      <div class="col-lg-6">
        <input type=text class="form-control" placeholder="Tarea" outlined/>
      </div>
      <div class="col-lg-6">
        <input type=text class="form-control" placeholder="Emplazamiento" outlined/>
      </div>
      <div class="col-lg-6">
        <textarea type=text class="form-control" placeholder="Maquinaria/Equipo"></textarea>
      </div>
      <div class="col-lg-6">
        <textarea type=text class="form-control" placeholder="Descripción de la tarea, fases de trabajo (1,2,3...)"></textarea>
      </div>
      <div class="col-lg-6">
        <label>Imagen del lugar de trabajo</label>
        <input type="file" placeholder="Hola" />
      </div>
      <div class="col-lg-6">
        <label>Dibujo del lugar del trabajo</label>
        <input type="file" placeholder="Hola" />
      </div>
    </div>
    <div class="row">
      <h3>1 Puesto de trabajo (marcar deficiencias)</h3>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <table>
          <tr>
            <td><label>Area horizontal</label></td>
            <td class="pl-2"><input type=checkbox class="form-control"/></td>
          </tr>
          <tr>
            <td><label>Altura de trabajo</label></td>
            <td class="pl-2"><input type=checkbox class="form-control"/></td>
          </tr>
          <tr>
            <td><label>Vista</label></td>
            <td class="pl-2"><input type=checkbox class="form-control"/></td>
          </tr>
          <tr>
            <td><label>Espacio piernas</label></td>
            <td class="pl-2"><input type=checkbox class="form-control"/></td>
          </tr>
          <tr>
            <td><label>Asientos</label></td>
            <td class="pl-2"><input type=checkbox class="form-control"/></td>
          </tr>
          <tr>
            <td><label>Herramientas</label></td>
            <td class="pl-2"><input type=checkbox class="form-control"/></td>
          </tr>
          <tr>
            <td><label>Otros equpos</label></td>
            <td class="pl-2"><input type=checkbox class="form-control"/></td>
          </tr>
        </table>
      </div>
      <div class="col-lg-6">
        <div class="row">
          <div class="col-lg-12">
            <textarea class="form-control" id="" placeholder="Observaciones"></textarea>
          </div>
          <div class="col-lg-6">
            <input type="number" class="form-control" placeholder="Analista">
          </div>
          <div class="col-lg-6">
            <input type="number" class="form-control" placeholder="Trabajador">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <h3>2 Actividad física general</h3>
      </div>
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12">
            <textarea class="form-control" id="" placeholder="Observaciones"></textarea>
          </div>
          <div class="col-lg-6">
            <input type="number" class="form-control" placeholder="Analista">
          </div>
          <div class="col-lg-6">
            <input type="number" class="form-control" placeholder="Trabajador">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <h3>3 Levantamiento de cargas</h3>
      </div>
      <div class="col-lg-12">
        Altura del levantamiento
      </div>
      <div class="col-lg-6">
        Normal <input type="checkbox">
        Bajo <input type="checkbox">
      </div>
      <div class="col-lg-6">
        N° de cargas levantadas
        <input type="number" class="form-control">
      </div>
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12">
            <textarea class="form-control" id="" placeholder="Condiciones del levantamiento"></textarea>
          </div>
          <div class="col-lg-6">
            <input type="number" class="form-control" placeholder="Analista">
          </div>
          <div class="col-lg-6">
            <input type="number" class="form-control" placeholder="Trabajador">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <h3>4 Posturas de trabajo y movimientos</h3>
      </div>
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-4">
            Cuello-hombros
          </div>
          <div class="col-lg-5">
            <input type="text" class="form-control" placeholder="ratio" style="display:inline; width: 75px;">
            <input type="text" class="form-control" placeholder="Duración (h)" style="display:inline; width: 100px;">
            <input type="text" class="form-control" placeholder="ratio" style="display:inline; width: 75px;">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            Codo-muñeca
          </div>
          <div class="col-lg-5">
            <input type="text" class="form-control" placeholder="ratio" style="display:inline; width: 75px;">
            <input type="text" class="form-control" placeholder="Duración (h)" style="display:inline; width: 100px;">
            <input type="text" class="form-control" placeholder="ratio" style="display:inline; width: 75px;">
          </div>
        </div>
        <div class="row">
        <div class="col-lg-4">
          Espalda
        </div>
          <div class="col-lg-5">
            <input type="text" class="form-control" placeholder="ratio" style="display:inline; width: 75px;">
            <input type="text" class="form-control" placeholder="Duración (h)" style="display:inline; width: 100px;">
            <input type="text" class="form-control" placeholder="ratio" style="display:inline; width: 75px;">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            Caderas-piernas
          </div>
          <div class="col-lg-5">
            <input type="text" class="form-control" placeholder="ratio" style="display:inline; width: 75px;">
            <input type="text" class="form-control" placeholder="Duración (h)" style="display:inline; width: 100px;">
            <input type="text" class="form-control" placeholder="ratio" style="display:inline; width: 75px;">
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12">
            <textarea class="form-control" id="" placeholder="Observaciones"></textarea>
          </div>
          <div class="col-lg-6">
            <input type="number" class="form-control" placeholder="Analista">
          </div>
          <div class="col-lg-6">
            <input type="number" class="form-control" placeholder="Trabajador">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <h3>6 Contenido del trabajo</h3>
      </div>
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12">
            <textarea class="form-control" id="" placeholder="Observaciones"></textarea>
          </div>
          <div class="col-lg-6">
            <input type="number" class="form-control" placeholder="Analista">
          </div>
          <div class="col-lg-6">
            <input type="number" class="form-control" placeholder="Trabajador">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <h3>7 Autonomía</h3>
      </div>
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12">
            <textarea class="form-control" id="" placeholder="Observaciones"></textarea>
          </div>
          <div class="col-lg-6">
            <input type="number" class="form-control" placeholder="Analista">
          </div>
          <div class="col-lg-6">
            <input type="number" class="form-control" placeholder="Trabajador">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <h3>8 Comunicación del trabajador y conf. personales</h3>
      </div>
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12">
            <textarea class="form-control" id="" placeholder="Observaciones"></textarea>
          </div>
          <div class="col-lg-6">
            <input type="number" class="form-control" placeholder="Analista">
          </div>
          <div class="col-lg-6">
            <input type="number" class="form-control" placeholder="Trabajador">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <h3>9 Toma de decisiones</h3>
      </div>
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12">
            <textarea class="form-control" id="" placeholder="Observaciones"></textarea>
          </div>
          <div class="col-lg-6">
            <input type="number" class="form-control" placeholder="Analista">
          </div>
          <div class="col-lg-6">
            <input type="number" class="form-control" placeholder="Trabajador">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <h3>10 Repetitividad del trabajo</h3>
      </div>
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12">
            <textarea class="form-control" id="" placeholder="Observaciones"></textarea>
          </div>
          <div class="col-lg-6">
            <input type="number" class="form-control" placeholder="Analista">
          </div>
          <div class="col-lg-6">
            <input type="number" class="form-control" placeholder="Trabajador">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <button class="btn btn-primary" @click="sendEvaluation">Actualizar</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import ENV from '../../env';
export default {
  methods: {
    sendEvaluation() {
      console.log('hola')
      axios.post(ENV.urlApiBase + '/job_analysis/create', this.jobValoration).then(res => {
        console.log(res)
      })
    }
  },
  data () {
    return {
      jobValoration: {
        patient_id: 1,
        valoration_job_analysis_empresa: [
          {
            name: 'empresa',
            cie10_id: null,
            section: 'valoration_job_analysis_empresa_empresa',
            json_values: null
          }
        ]
      }
    }
  }
}
</script>

<style>

</style>
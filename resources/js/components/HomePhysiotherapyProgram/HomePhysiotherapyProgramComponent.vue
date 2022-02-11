<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Programa fisioterapéutico en casa</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <input type="text" class="form-control" placeholder="Nombre" v-model="hfp.name">
                <button type="button" class="btn btn-primary" @click="changeName()">Cambiar nombre</button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <input type="text" class="form-control" placeholder="Páginas" v-model="hfp.pages">
                <button type="button" class="btn btn-primary" @click="changePages()">Cambiar páginas</button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <input type="text" class="form-control" placeholder="Código" v-model="hfp.code">
                <button type="button" class="btn btn-primary" @click="changeCode()">Cambiar código</button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <input type="text" class="form-control" placeholder="Versión" v-model="hfp.version">
                <button type="button" class="btn btn-primary" @click="changeVersion()">Cambiar versión</button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <input type="text" class="form-control" placeholder="Elaborado por" v-model="hfp.made_by">
                <button type="button" class="btn btn-primary" @click="changeMadeBy()">Cambiar elaborado por</button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <input type="text" class="form-control" placeholder="Revisado por" v-model="hfp.revised_by">
                <button type="button" class="btn btn-primary" @click="changeRevisedBy()">Cambiar revisado por</button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h4><strong>Categoría Anatomica/Fisiológica</strong></h4>
                <multiselect class="mb-2" :multiple="false" v-model="hfp.glosary_ap" :options="glosary_ap" placeholder="Categoria anatomica/fisiológica" label="label" track-by="id"></multiselect>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h4><strong>Palabras clave</strong></h4>
                <multiselect class="mb-2" :multiple="true" v-model="hfp.keywords" :options="keywords" placeholder="Palabras Clave" label="name" track-by="id"></multiselect>
            </div>
        </div>
            <exercise-form :key="updateExercise" @onExerciseCategoryAdded="onExerciseCategoryAdded" @onExerciseDeleted = "onExerciseDeleted" @onExerciseImageRemoved = "onExerciseImageRemoved" @onExerciseAdded = "addExercise" @onExerciseEditted = "onExerciseEditted" :exercises = "hfp.exercises" :exercise_divisions = "hfp.exercise_divisions"></exercise-form>
            <massage-form @onMassageDeleted = "onMassageDeleted" @onMassageRemoved = "onMassageRemoved" @onMassageAdded = "addMassage" @onMassageEditted = "onMassageEditted" :massages = "hfp.massages"></massage-form>
            <physical-agent-form @onPhysicalAgentDeleted = "onPhysicalAgentDeleted" @onPhysicalAgentRemoved = "onPhysicalAgentRemoved" @onPhysicalAgentAdded = "addPhysicalAgent" @onPhysicalAgentEditted = "onPhysicalAgentEditted" :physical_agents = "hfp.physical_agents"></physical-agent-form>
            <prescription-form @onPrescriptionDeleted = "onPrescriptionDeleted" @onPrescriptionRemoved = "onPrescriptionRemoved" @onPrescriptionAdded = "addPrescription" @onPrescriptionEditted = "onPrescriptionEditted" :prescriptions = "hfp.prescriptions"></prescription-form>
            <contraindication-form @onContraindicationDeleted = "onContraindicationDeleted" @onContraindicationAdded = "addContraindication" @onContraindicationEditted = "onContraindicationEditted" :contraindications = "hfp.contraindications"></contraindication-form>
            <hr>
        <div class="row">
            <div class="col-lg-12">
                <h5><strong>Bibliografía</strong></h5>
                <textarea rows=4 class="form-control" v-model="hfp.bibliography" placeholder="Bibliogafía"></textarea>
                <button type="button" class="btn btn-primary" @click="changeBibliography()">Cambiar bibliografía</button>
            </div>
        </div>
    </div>
</template>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<script>
    import Multiselect from 'vue-multiselect'
    import ENV from '../../env'
    // register globally
    Vue.component('exercise-form', require('./ExerciseForm.vue').default);
    Vue.component('massage-form', require('./MassageForm.vue').default);
    Vue.component('physical-agent-form', require('./PhysicalAgentForm.vue').default);
    Vue.component('prescription-form', require('./PrescriptionForm.vue').default);
    Vue.component('contraindication-form', require('./ContraindicationForm.vue').default);
    export default {
        components: { Multiselect },
        props: ['id'],
        mounted() {
        },
        created : function () {
            if (!this.id) {
                const name = prompt("Introduce el nombre del nuevo ejercicio");
                const data = {
                    name : name
                };
                axios.post(ENV.urlApiHFPBase, data).then(
                    this.setHfp
                );
            } else {
                axios.get(ENV.urlApiHFPBase + '/' + this.id).then(this.setHfp);
            }
            axios.get(ENV.urlBase + '/keywords/ajaxGet/').then(
                (keywords) => {
                    this.keywords = keywords.data.map(keyword => {
                        keyword.name = keyword.label
                        return keyword
                    })
                }
            );
            axios.get(ENV.urlBase + '/anato_physiology_glosary_item/ajaxGet/%25').then(
                (res) => {
                    this.glosary_ap.label = res.data.name
                    this.glosary_ap = res.data
                }
            );
        },
        watch: {
            'hfp.keywords' : function () {
                const url = `${ENV.urlApiHFPBase}/${this.hfp.id}/keywords`
                axios.post(url, {keywords: this.hfp.keywords})
            },
            'hfp.glosary_ap' : function () {
                const url = `${ENV.urlApiHFPBase}/${this.hfp.id}/glosary_ap`
                axios.post(url, {glosary_ap: this.hfp.glosary_ap})
            }
        },
        methods : {
            changeBibliography () {
                const url = `${ENV.urlApiHFPBase}/${this.id}`
                if (this.hfp.name.length > 0) {
                    axios.put(url, {bibliography: this.hfp.bibliography}).then(() => {
                        alert ('Bibliografía cambiada con éxito')
                    })
                }
            },
            changeName : function () {
                const url = `${ENV.urlApiHFPBase}/${this.id}`
                if (this.hfp.name.length > 0) {
                    axios.put(url, {name: this.hfp.name}).then(() => {
                        alert ('Nombre cambiado con éxito')
                    })
                }
            },
            changePages () {
                const url = `${ENV.urlApiHFPBase}/${this.id}`
                if (this.hfp.pages.length > 0) {
                    axios.put(url, {pages: this.hfp.pages}).then(() => {
                        alert ('Número de páginas ha cambiado con éxito')
                    })
                }
            },
            changeCode () {
                const url = `${ENV.urlApiHFPBase}/${this.id}`
                if (this.hfp.code.length > 0) {
                    axios.put(url, {code: this.hfp.code}).then(() => {
                        alert ('Código cambiado con éxito')
                    })
                }
            },
            changeVersion () {
                const url = `${ENV.urlApiHFPBase}/${this.id}`
                if (this.hfp.version.length > 0) {
                    axios.put(url, {version: this.hfp.version}).then(() => {
                        alert ('Nombre cambiado con éxito')
                    })
                }
            },
            changeMadeBy () {
                const url = `${ENV.urlApiHFPBase}/${this.id}`
                if (this.hfp.made_by.length > 0) {
                    axios.put(url, {made_by: this.hfp.made_by}).then(() => {
                        alert ('Elaborado por ha cambiado con éxito')
                    })
                }
            },
            changeRevisedBy () {
                const url = `${ENV.urlApiHFPBase}/${this.id}`
                if (this.hfp.revised_by.length > 0) {
                    axios.put(url, {revised_by: this.hfp.revised_by}).then(() => {
                        alert ('Revisor cambiado con éxito')
                    })
                }
            },
            onExerciseCategoryAdded (exercise_category) {
                axios.post(ENV.urlApiHFPBase + '/'+this.hfp.id+'/exercise_category', exercise_category).then(_addExerciseCategory.bind(this));
                function _addExerciseCategory(response) {
                    Vue.set(this.hfp, 'exercise_divisions', response.data);
                    this.updateExercise = Math.random()
                    alert('Categoría de ejercicio agregado con éxito');
                }
            },
            addExercise : function(event, exercise) {
                axios.post(ENV.urlApiHFPBase + '/'+this.hfp.id+'/exercise', exercise).then(_addExercise.bind(this));
                function _addExercise(response) {
                    this.hfp.exercises.push(response.data);
                    alert('Ejercicio agregado con éxito');
                }
            },
            onExerciseDeleted (exerciseId) {
                axios.delete(ENV.urlApiHFPBase + '/'+this.hfp.id+'/exercise/' + exerciseId).then(_removeExercise.bind(this));
                function _removeExercise(response) {
                    Vue.set(this.hfp, 'exercises', response.data);
                }
            },
            onExerciseImageRemoved : function(event, exerciseId, imageResourceId, index) {
                axios.delete(ENV.urlApiHFPBase + '/'+this.hfp.id+'/exercise/' + exerciseId + '/image_resource/' + imageResourceId).then(_removeExercise.bind(this));
                function _removeExercise(response) {
                    Vue.set(this.hfp.exercises, index, response.data);
                }
            },
            onExerciseEditted : function (event, exercise, index) {
                ;
                axios.put(ENV.urlApiHFPBase + '/'+this.hfp.id+'/exercise', exercise).then(_putExercise.bind(this));
                function _putExercise(response) {
                    Vue.set(this.hfp.exercises, index, response.data);
                }
            },
            addMassage : function(event, massage) {
                axios.post(ENV.urlApiHFPBase + '/'+this.hfp.id+'/massage', massage).then(_addMassage.bind(this));
                function _addMassage(response) {
                    if(!this.hfp.massages) this.hfp.massages = []
                    this.hfp.massages.push(response.data);
                    alert('Masaje agregado con éxito');
                }
            },
            onMassageDeleted (massageId) {
                axios.delete(ENV.urlApiHFPBase + '/'+this.hfp.id+'/massage/' + massageId).then(_removeExercise.bind(this));
                function _removeExercise(response) {
                    Vue.set(this.hfp, 'massages', response.data);
                }
            },
            onMassageEditted : function (event, massage, index) {
                axios.put(ENV.urlApiHFPBase + '/'+this.hfp.id+'/massage', massage).then(_putMassage.bind(this));
                function _putMassage(response) {
                    Vue.set(this.hfp.massages, index, response.data);
                }
            },
            onMassageRemoved : function(event, exerciseId, imageResourceId, index) {
                axios.delete(ENV.urlApiHFPBase + '/'+this.hfp.id+'/massage/' + exerciseId + '/image_resource/' + imageResourceId).then(_removeMassage.bind(this));
                function _removeMassage(response) {
                    Vue.set(this.hfp.massages, index, response.data);
                }
            },
            addPhysicalAgent : function(event, physicalAgent) {
                axios.post(ENV.urlApiHFPBase + '/'+this.hfp.id+'/physical_agent', physicalAgent).then(_addPhysicalAgent.bind(this));
                function _addPhysicalAgent(response) {
                    this.hfp.physical_agents.push(response.data);
                    alert('Agente físico agregado con éxito');
                }
            },
            onPhysicalAgentDeleted (physicalAgentId) {
                axios.delete(ENV.urlApiHFPBase + '/'+this.hfp.id+'/physical_agent/' + physicalAgentId).then(_removeExercise.bind(this));
                function _removeExercise(response) {
                    Vue.set(this.hfp, 'physical_agents', response.data);
                }
            },
            onPhysicalAgentEditted : function (event, physicalAgent, index) {
                ;
                axios.put(ENV.urlApiHFPBase + '/'+this.hfp.id+'/physical_agent', physicalAgent).then(_putPhysicalAgent.bind(this));
                function _putPhysicalAgent(response) {
                    Vue.set(this.hfp.physical_agents, index, response.data);
                }
            },
            onPhysicalAgentRemoved : function(event, exerciseId, imageResourceId, index) {
                axios.delete(ENV.urlApiHFPBase + '/'+this.hfp.id+'/physical_agent/' + exerciseId + '/image_resource/' + imageResourceId).then(_removePhysicalAgent.bind(this));
                function _removePhysicalAgent(response) {
                    Vue.set(this.hfp.physical_agents, index, response.data);
                }
            },
            addPrescription : function(event, prescription) {
                axios.post(ENV.urlApiHFPBase + '/'+this.hfp.id+'/prescription', prescription).then(_addPrescription.bind(this));
                function _addPrescription(response) {
                    this.hfp.prescriptions.push(response.data);
                    alert('Medicamento agregado con éxito');
                }
            },
            onPrescriptionDeleted (prescriptionId) {
                axios.delete(ENV.urlApiHFPBase + '/'+this.hfp.id+'/prescription/' + prescriptionId).then(_removeExercise.bind(this));
                function _removeExercise(response) {
                    Vue.set(this.hfp, 'prescriptions', response.data);
                }
            },
            onPrescriptionEditted : function (event, prescription, index) {
                ;
                axios.put(ENV.urlApiHFPBase + '/'+this.hfp.id+'/prescription', prescription).then(_putPrescription.bind(this));
                function _putPrescription(response) {
                    Vue.set(this.hfp.prescriptions, index, response.data);
                }
            },
            onPrescriptionRemoved : function(event, exerciseId, imageResourceId, index) {
                axios.delete(ENV.urlApiHFPBase + '/'+this.hfp.id+'/prescription/' + exerciseId + '/image_resource/' + imageResourceId).then(_removePrescription.bind(this));
                function _removePrescription(response) {
                    Vue.set(this.hfp.prescriptions, index, response.data);
                }
            },
            addContraindication : function(event, contraindication) {
                axios.post(ENV.urlApiHFPBase + '/'+this.hfp.id+'/contraindication', contraindication).then(_addContraindication.bind(this));
                function _addContraindication(response) {
                    this.hfp.contraindications.push(response.data);
                    alert('Contraindicación agregada con éxito');
                }
            },
            onContraindicationDeleted (contraindicationId) {
                axios.delete(ENV.urlApiHFPBase + '/'+this.hfp.id+'/contraindication/' + contraindicationId).then(_removeExercise.bind(this));
                function _removeExercise(response) {
                    Vue.set(this.hfp, 'contraindications', response.data);
                }
            },
            onContraindicationEditted : function (event, contraindication, index) {
                ;
                axios.put(ENV.urlApiHFPBase + '/'+this.hfp.id+'/contraindication', contraindication).then(_putContraindication.bind(this));
                function _putContraindication(response) {
                    Vue.set(this.hfp.contraindications, index, response.data);
                }
            },
            setHfp: function(response) {
                this.id = response.data.id;
                this.hfp.name = response.data.name;
                this.hfp.pages = response.data.pages;
                this.hfp.code = response.data.code;
                this.hfp.version = response.data.version;
                this.hfp.made_by = response.data.made_by;
                this.hfp.bibliography = response.data.bibliography;
                this.hfp.revised_by = response.data.revised_by;
                this.hfp.id = response.data.id;
                this.hfp.glosary_ap = (response.data.anato_physiology_glosary_item) ? response.data.anato_physiology_glosary_item : this.hfp.anato_physiology_glosary_item;
                if(this.hfp.glosary_ap){
                    this.hfp.glosary_ap.label = (response.data.anato_physiology_glosary_item) ? response.data.anato_physiology_glosary_item.name : this.hfp.anato_physiology_glosary_item.name;
                }
                this.hfp.keywords = (response.data.keywords) ? response.data.keywords : this.hfp.keywords;
                this.hfp.exercises = (response.data.exercise) ? response.data.exercise : this.hfp.exercises;
                this.hfp.massages = (response.data.massage) ? response.data.massage : this.hfp.massage;
                this.hfp.massages = this.hfp.massages ? this.hfp.massages : []
                this.hfp.physical_agents = (response.data.physical_agent) ? response.data.physical_agent : this.hfp.physical_agents;
                this.hfp.prescriptions = (response.data.prescription) ? response.data.prescription : this.hfp.prescriptions;
                this.hfp.contraindications = (response.data.contraindication) ? response.data.contraindication : this.hfp.contraindications;
                this.hfp.exercise_divisions = (response.data.exercise_divisions) ? response.data.exercise_divisions : this.hfp.exercise_divisions;            }
        },
        data : function () {
            return {
                updateExercise: 1,
                keywords: [],
                glosary_ap: [],
                hfp : {
                    id: '',
                    name: '',
                    pages: null,
                    code: null,
                    version: null,
                    made_by: null,
                    revised_by: null,
                    glosary_ap: {},
                    keywords: [],
                    exercises : [],
                    massages : [],
                    physical_agents : [],
                    prescriptions : [],
                    contraindications : [],
                    adverse_effects : [],
                }
            };
        }
    }
</script>

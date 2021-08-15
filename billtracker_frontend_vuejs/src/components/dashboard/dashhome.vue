<template>
<div>
     <topbar />
     <div class="dashboard shadow rounded">
         
        <Sidebar/>
        <div class="content">

            <router-view/>
        </div>
    </div>
</div>
   
</template>

<script>
import Sidebar from '../../components/Sidebar'
import topbar from '../../components/topbar'


export default {
    name: 'home',
    components: {
        Sidebar,
        topbar
    
    }
}
</script>

<style>
.dashboard {
    display: grid;
    grid-template-columns: 1fr 5fr;
    background-color:#1A237E;
    height: 96vh;
    width: 100vw;
}
.content {
    background-color: white;
    border-radius: 10px;
    margin: 6px 6px 6px 0px;
    
}
</style>
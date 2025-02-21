<style>
    .reports-body {
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: center;
        text-align: initial;
        position: relative;
    }

    .reports-title {
        position: relative;
        background-color: red;
        width: 100%;
    }

    .reports-content {
        position: relative;
        background-color: blue;
        width: 100%;
        min-height: 85vh;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
    }
</style>

<div class="reports-body">
    <div class="reports-title">
        <h1> Relatório: </h1>
    </div>
    <div class="reports-content">
        @livewire('report-table')
    </div>
</div>

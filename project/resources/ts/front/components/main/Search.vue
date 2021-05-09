<template>
    <div class="col-3" id="sticky-sidebar">
        <div class="sticky-top">
            <div class="nav flex-column">
                <div class="card">
                    <div class="card-header">
                    Featured
                    </div>
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">検索1</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">ちゃんと検索してね!</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">検索2</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">ちゃんと検索してね!</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
    import { Vue, Component, Watch } from 'vue-property-decorator';

    @Component
    export default class Search extends Vue {
    }
</script>

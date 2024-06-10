<div id="loading" class="d-none">
    <span class="loader"></span>
</div>

<style>
    #loading {
        width: 100%;
        height: 100%;
        position: fixed;
        background: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        bottom: 0;
        top: 0;
    }

    .loader {
        position: fixed;
        top: 50%;
        transform: translate(-50%);
        left: 50%;
        z-index: 1;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: inline-block;
        border-top: 4px solid #FFF;
        border-right: 4px solid transparent;
        box-sizing: border-box;
        animation: rotation 1s linear infinite;
    }

    .loader::after {
        content: '';
        box-sizing: border-box;
        position: absolute;
        left: 0;
        top: 0;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        border-bottom: 4px solid var(--bs-info);
        border-left: 4px solid transparent;
    }

    @keyframes rotation {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

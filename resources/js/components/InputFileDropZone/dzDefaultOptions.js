import { THREAD_CSRF_TOKEN } from '@/constants'

export default {
  headers: {
    'X-CSRF-Token': THREAD_CSRF_TOKEN
  },
  timeout: 3000000,
  paramName: "file",
  maxFilesize: 254, //Mb
  chunking: true,
  forceChunking: true,
  addRemoveLinks: true,
  parallelChunkUploads: false,
  retryChunks: true,
  autoProcessQueue: false,
  thumbnailWidth: 400, // px
  thumbnailHeight: 400,
}

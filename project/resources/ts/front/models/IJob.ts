export default interface IJob {
    id: string
    title: string
    content: string
    attention: boolean
    job_category_id: string
    price: number|null
    image: string
    sort_no: string
}
